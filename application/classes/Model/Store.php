<?php

class Model_Store extends Kohana_Model
{
    const PRODUCT_TYPE_NEW = 'new';
    const PRODUCT_TYPE_CONTRACT = 'contract';

    public $productsType = [
        self::PRODUCT_TYPE_NEW           => 'Новая',
        self::PRODUCT_TYPE_CONTRACT      => 'Контрактная'
    ];

    /**
     * @param string $brand
     * @param string $article
     * @param string $name
     * @param int $quantity
     * @param int $price
     * @param int $distributorId
     * @param string $type
     * @param string $place
     * 
     * @return int|null
     * 
     * @throws Kohana_Exception
     */
    public function addRemain($brand, $article, $name, $quantity, $price, $distributorId, $type, $place)
    {
        /** @var Model_Product $productModel */
        $productModel = Model::factory('Product');
        
        $brandObject = Arr::get($productModel->findBrands(null, $brand), 0);
        
        $brandId = Arr::get($brandObject, 'id');
        
        if (null === $brandId) {
            $brandId = $productModel->addBrand($brand);
        }
        
        $productObject = Arr::get($productModel->findProduct(null, $brandId, $article), 0);
            
        $productId = Arr::get($productObject, 'id');
        
        if (null === $productId) {
            $productId = $productModel->addProduct($brandId, $article, $name);
        }

        $storeRemain = $this->findRemain(null, $productId, $distributorId, $type);

        if (empty($storeRemain)) {
            $res = DB::insert('store__remain', [
                'product_id', 'quantity', 'price', 'distributor_id', 'type', 'place'
            ])
                ->values([
                    $productId, $quantity, $price, $distributorId, $type, $place
                ])
                ->execute()
            ;

            $storeRemainId = Arr::get($res, 0);
        } else {
            $storeRemainId = Arr::get(Arr::get($storeRemain, 0, []), 'id');

            DB::update('store__remain')
                ->set(['quantity' => $quantity, 'price' => $price, 'place' => $place])
                ->where('id', '=', $storeRemainId)
                ->execute()
            ;
        }

        return [
            $brandId,
            $productId,
            $storeRemainId,
        ];
    }

    /**
     * @param null|int $id
     * @param null|int $productId
     * @param null|int $distributorId
     * @param null|string $type
     *
     * @return array
     */
    public function findRemain($id = null, $productId = null, $distributorId = null, $type = null)
    {
        /** @var Database_Query_Builder_Select $query */
        $query = DB::select(
                'sr.*', 
                ['pb.name', 'brand_name'], 
                'p.article',
                ['p.name', 'product_name']
            )
            ->from(['store__remain', 'sr'])
            ->join(['products', 'p'])
            ->on('p.id', '=', 'sr.product_id')
            ->join(['products__brands', 'pb'])
            ->on('pb.id', '=', 'p.brand_id')
            ->where('', '', 1)
        ;

        $query = null !== $id ? $query->and_where('id', '=', $id) : $query;
        $query = null !== $productId ? $query->and_where('product_id', '=', $productId) : $query;
        $query = null !== $distributorId ? $query->and_where('distributor_id', '=', $distributorId) : $query;
        $query = null !== $type ? $query->and_where('type', '=', $type) : $query;

        return $query->execute()->as_array();
    }

    /**
     * @param array $files
     * 
     * @return bool
     */
    public function uploadProducts($files, $distributorId)
    {
        /** @var Model_Admin $adminModel */
        $adminModel = Model::factory('Admin');

        $carMarks = $this->findAllCarMarks();

        $inputFileName = sprintf('public/prices/%s', $files['name']);

        copy($files['tmp_name'], $inputFileName);

        $inputFileType = 'CSV';

        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objReader->setDelimiter(';');
        $objReader->setInputEncoding('Windows-1251');

        $objPHPExcel = $objReader->load($inputFileName);

        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        foreach ($sheetData as $i => $row) {
            if ($i == 1) {
                continue;
            }

            $name = $row['B'];
            $carMark = $row['C'];
            $carModel = $row['D'];
            $carEngine = $row['E'];
            $carChassis = $row['F'];
            $marking = $row['G'];
            $frontRear = $row['H'];
            $leftRight = $row['I'];
            $topBottom = $row['J'];
            $quantity = $row['L'] === 'в наличии' ? 1 : 0;
            $price = $row['N'];

            if (empty($carMark) || empty($carModel)) {
                continue;
            }

            if (!in_array($carMark, $carMarks)) {
                $newMark = DB::insert('cars__marks', ['name'])
                    ->values([$carMark])
                    ->execute()
                ;

                $markId = Arr::get($newMark, 0);

                $carMarks[] = $carMark;
            } else {
                $markId = array_search($carMark, $carMarks);
            }

            $modelId = $this->getModelId($markId, $carModel);

            $engineId = null;

            if (!empty($carEngine)) {
                $engineId = $this->getEngineId($modelId, $carEngine);
            }

            $chassisId = null;

            if (!empty($carChassis)) {
                $chassisId = $this->getChassisId($modelId, $carChassis);
            }

            $addResult = $this->addRemain(
                $carMark,
                strtoupper(
                    $adminModel->slugify(
                        sprintf(
                            '%s_%s%s%s%s',
                            $carModel,
                            $name,
                            !empty($frontRear) ? '_'. $frontRear : null,
                            !empty($leftRight) ? '_'. $leftRight : null,
                            !empty($topBottom) ? '_'. $topBottom : null
                        )
                    )
                ),
                sprintf(
                    '%s %s %s %s',
                    $name,
                    $carMark,
                    $carModel,
                    $carChassis
                ),
                $quantity,
                $price,
                $distributorId,
                self::PRODUCT_TYPE_CONTRACT,
                ''
            );

            $productId = $addResult[1];

            $count = DB::select()
                ->from('products__cars')
                ->where('product_id', '=', $productId)
                ->limit(1)
                ->execute()
                ->count()
            ;

            if ($count === 0) {
                DB::insert('products__cars', [
                        'product_id',
                        'mark_id',
                        'model_id',
                        'chassis_id',
                        'engine_id',
                        'marking',
                        'front_rear',
                        'left_right',
                        'top_bottom'
                    ])
                    ->values([
                        $productId,
                        $markId,
                        $modelId,
                        $chassisId,
                        $engineId,
                        $marking,
                        $frontRear,
                        $leftRight,
                        $topBottom
                    ])
                    ->execute()
                ;
            }
        }

        return true;
    }

    /**
     * @return array
     */
    public function findAllCarMarks()
    {
        return DB::select()
            ->from('cars__marks')
            ->execute()
            ->as_array('id', 'name')
        ;
    }

    /**
     * @param string $name
     *
     * @return array
     */
    public function findCarMarkByName($name = '')
    {
        return DB::select()
            ->from('cars__marks')
            ->where('name', '=', $name)
            ->execute()
            ->as_array('id', 'name')
        ;
    }

    /**
     * @param string $name
     *
     * @return array
     */
    public function findCarMarkBySubName($name = '')
    {
        return DB::select()
            ->from('cars__marks')
            ->where('name', 'like', sprintf('%%%s%%', $name))
            ->execute()
            ->as_array('id', 'name')
        ;
    }

    /**
     * @param int $markId
     * @param string $modelName
     *
     * @return int
     *
     * @throws Kohana_Exception
     */
    public function getModelId($markId, $modelName)
    {
        $issetModel = $this->findCarModelByNameAndMark($markId, $modelName);

        if (!$issetModel) {
            /** @var array $newModel */
            $newModel = DB::insert('cars__models', ['mark_id', 'name'])
                ->values([$markId, $modelName])
                ->execute()
            ;

            $modelId = Arr::get($newModel, 0);
        } else {
            $modelId = Arr::get($issetModel, 'id');
        }

        return $modelId;
    }

    /**
     * @param int $markId
     * @param string $name
     *
     * @return array
     */
    public function findCarModelByNameAndMark($markId, $name)
    {
        return DB::select()
            ->from('cars__models')
            ->where('mark_id', '=', $markId)
            ->and_where('name', '=', $name)
            ->execute()
            ->current()
        ;
    }

    /**
     * @param int $modelId
     * @param string $engineName
     *
     * @return int
     *
     * @throws Kohana_Exception
     */
    public function getEngineId($modelId, $engineName)
    {
        $issetEngine = $this->findCarEngineByNameAndModel($modelId, $engineName);

        if (!$issetEngine) {
            /** @var array $newEngine */
            $newEngine = DB::insert('cars__engines', ['model_id', 'name'])
                ->values([$modelId, $engineName])
                ->execute()
            ;

            $enginelId = Arr::get($newEngine, 0);
        } else {
            $enginelId = Arr::get($issetEngine, 'id');
        }

        return $enginelId;
    }

    /**
     * @param int $modelId
     * @param string $name
     *
     * @return array
     */
    public function findCarEngineByNameAndModel($modelId, $name)
    {
        return DB::select()
            ->from('cars__engines')
            ->where('model_id', '=', $modelId)
            ->and_where('name', '=', $name)
            ->execute()
            ->current()
        ;
    }

    /**
     * @param int $modelId
     * @param string $chassisName
     *
     * @return int
     *
     * @throws Kohana_Exception
     */
    public function getChassisId($modelId, $chassisName)
    {
        $issetChassis = $this->findCarChassisByNameAndModel($modelId, $chassisName);

        if (!$issetChassis) {
            /** @var array $newChassis */
            $newChassis = DB::insert('cars__chassis', ['model_id', 'name'])
                ->values([$modelId, $chassisName])
                ->execute()
            ;

            $chassislId = Arr::get($newChassis, 0);
        } else {
            $chassislId = Arr::get($issetChassis, 'id');
        }

        return $chassislId;
    }

    /**
     * @param int $modelId
     * @param string $name
     *
     * @return array
     */
    public function findCarChassisByNameAndModel($modelId, $name)
    {
        return DB::select()
            ->from('cars__chassis')
            ->where('model_id', '=', $modelId)
            ->and_where('name', '=', $name)
            ->execute()
            ->current()
        ;
    }
}