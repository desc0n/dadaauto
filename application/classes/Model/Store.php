<?php

class Model_Store extends Kohana_Model
{
    const PRODUCT_TYPE_NEW = 'new';
    const PRODUCT_TYPE_CONTRACT = 'contract';
    const PRODUCT_TYPE_PRICE = 'price';

    public $productsType = [
        self::PRODUCT_TYPE_NEW              => 'Новая',
        self::PRODUCT_TYPE_CONTRACT         => 'Контрактная',
        self::PRODUCT_TYPE_PRICE            => 'Из прайса'
    ];

    public $mainFieldKey = [
        1 => 'Наименование',
        2 => 'Марка',
        3 => 'Модель',
        4 => 'Двигатель',
        5 => 'Кузов',
        6 => 'Маркировка',
        7 => 'Перез/зад',
        8 => 'Право/лево',
        9 => 'Верх/низ',
        10 => 'Наличие',
        11 => 'Цена',
        12 => 'Изображение'
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
     * @param int $id
     * @param int $quantity
     * 
     * @return string
     */
    public function setRemainQuantity($id, $quantity)
    {
        DB::update('store__remain')
            ->set(['quantity' => $quantity])
            ->where('id', '=', $id)
            ->execute()
        ;
        
        return 'success';
    }


    /**
     * @param int $id
     * @param int $price
     *
     * @return string
     */
    public function setRemainPrice($id, $price)
    {
        DB::update('store__remain')
            ->set(['price' => $price])
            ->where('id', '=', $id)
            ->execute()
        ;

        return 'success';
    }

    /**
     * @param array $files
     * 
     * @return bool
     */
    public function uploadProducts($files, $distributorId)
    {
        $carMarks = $this->findAllCarMarks();

        $inputFileName = sprintf('public/prices/%s', $files['name']);

        copy($files['tmp_name'], $inputFileName);

        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);

        $objReader = PHPExcel_IOFactory::createReader($inputFileType);

        if ($inputFileType === 'CSV') {
            $objReader->setDelimiter(';');
            $objReader->setInputEncoding('Windows-1251');
        }

        $objReader->setReadDataOnly(true);

        $objPHPExcel = $objReader->load($inputFileName);

        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,false);

        $priceFields = $this->getPriceFields();

        $i = 0;

        foreach ($sheetData as $row) {
            $i++;

            if ($i === 1) {
                continue;
            }

            $this->uploadMainField($row, $distributorId, $carMarks, $priceFields);
        }

        return true;
    }


    public function uploadMainField($data, $distributorId, $carMarks, $priceFields)
    {
        /** @var Model_Admin $adminModel */
        $adminModel = Model::factory('Admin');

        /** @var Model_Payment $paymentModel */
        $paymentModel = Model::factory('Payment');

        $name = Arr::get($data, ($priceFields[1]['column'] - 1));
        $carMark = Arr::get($data, ($priceFields[2]['column'] - 1));
        $carModel = Arr::get($data, ($priceFields[3]['column'] - 1));
        $carEngine = Arr::get($data, ($priceFields[4]['column'] - 1));
        $carChassis = Arr::get($data, ($priceFields[5]['column'] - 1));
        $marking = Arr::get($data, ($priceFields[6]['column'] - 1));
        $frontRear = Arr::get($data, ($priceFields[7]['column'] - 1));
        $leftRight = Arr::get($data, ($priceFields[8]['column'] - 1));
        $topBottom = Arr::get($data, ($priceFields[9]['column'] - 1));
        $quantity = Arr::get($data, ($priceFields[10]['column'] - 1), 1) === 'в наличии' ? 1 : Arr::get($data, ($priceFields[10]['column'] - 1), 1);
        $price = Arr::get($data, ($priceFields[11]['column'] - 1));
        $imgs = Arr::get($data, ($priceFields[12]['column'] - 1));

        if (empty($carMark) || empty($carModel)) {
            return false;
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

        $price = $paymentModel->gitMarkupPrice($price);

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
            self::PRODUCT_TYPE_PRICE,
            ''
        );

        $productId = $addResult[1];

        DB::query(Database::INSERT,
            'INSERT INTO `products__cars` 
                (`product_id`, `mark_id`, `model_id`, `chassis_id`, `engine_id`, `marking`, `front_rear`, `left_right`, `top_bottom`)
                VALUES (:productId, :markId, :modelId, :chassisId, :engineId, :marking, :frontRear, :leftRight, :topBottom)
                ON DUPLICATE KEY UPDATE `marking` = :marking
            ')
            ->parameters([
                ':productId' => $productId,
                ':markId' => $markId,
                ':modelId' => $modelId,
                ':chassisId' => $chassisId,
                ':engineId' => $engineId,
                ':marking' => $marking,
                ':frontRear' => $frontRear,
                ':leftRight' => $leftRight,
                ':topBottom' => $topBottom
            ])
            ->execute()
        ;

        $imgsArr = explode(';', $imgs);

        foreach ($imgsArr as $src){
            DB::query(Database::INSERT, 'INSERT INTO `products__imgs` (`product_id`, `src`) VALUES(:productId, :src) ON DUPLICATE KEY UPDATE `src` = :src')
                ->parameters([
                    ':productId' => $productId,
                    ':src' => $src
                ])
                ->execute()
            ;
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

    /**
     * @return array
     */
    public function getPriceFormatData()
    {
        return DB::select(
            'sr.*',
            ['pb.name', 'brand_name'],
            'p.article',
            ['p.name', 'product_name'],
            ['cmarks.name', 'car_mark_name'],
            ['cm.name', 'car_model_name'],
            ['cc.name', 'car_chassis_name'],
            ['ce.name', 'car_engine_name'],
            'pc.front_rear',
            'pc.left_right',
            'pc.top_bottom',
            [DB::select([DB::expr('GROUP_CONCAT(pi.local_src SEPARATOR \';\')'), 'imgs'])->from(['products__imgs', 'pi'])->where('pi.product_id', '=', DB::expr('sr.product_id')), 'imgs']
        )
            ->from(['store__remain', 'sr'])
            ->join(['products', 'p'])
            ->on('p.id', '=', 'sr.product_id')
            ->join(['products__brands', 'pb'])
            ->on('pb.id', '=', 'p.brand_id')
            ->join(['products__cars', 'pc'])
            ->on('pc.product_id', '=', 'sr.product_id')
            ->join(['cars__marks', 'cmarks'], 'LEFT')
            ->on('cmarks.id', '=', 'pc.mark_id')
            ->join(['cars__models', 'cm'], 'LEFT')
            ->on('cm.id', '=', 'pc.model_id')
            ->join(['cars__chassis', 'cc'], 'LEFT')
            ->on('cc.id', '=', 'pc.chassis_id')
            ->join(['cars__engines', 'ce'], 'LEFT')
            ->on('ce.id', '=', 'pc.engine_id')
            ->where('sr.type', '=', 'price')
            ->execute()
            ->as_array()
        ;
    }

    /**
     * @return void
     */
    public function downloadPrice()
    {
        $file = fopen('public/prices/download/price.csv', 'w');

        $data = $this->getPriceFormatData();

        foreach ($data as $row) {
            $string = $row['product_name']
                . ';' . $row['car_mark_name']
                . ';' . $row['car_model_name']
                . ';' . $row['car_chassis_name']
                . ';' . $row['car_engine_name']
                . ';' . ';'
                . ';' . $row['front_rear']
                . ';' . $row['left_right']
                . ';' . $row['top_bottom']
                . ';' . ';'
                . ';' . $row['imgs']
                . chr(10)
            ;
            $string = mb_detect_encoding($string) == 'UTF-8' ? mb_convert_encoding($string, 'CP-1251') : $string;

            fwrite($file, $string);
        }

        fclose($file);
    }

    public function updateImg()
    {
        $imgs = DB::select()
            ->from('products__imgs')
            ->where('local_src', 'IS', NULL)
            ->execute()
            ->as_array()
        ;
        
        foreach ($imgs as $img) {
            $this->setLocalImg($img['id'], $img['src']);
        }
    }
    
    /**
     * @param int $id
     * @param string $url
     * 
     * @throws Kohana_Exception
     */
    public function setLocalImg($id, $url)
    {
        $file_name = 'public/img/original/'.$id.'.jpg';
        
        if (!empty($url) && copy($url, $file_name))	{
            $watermark = Image::factory('public/i/watermark.jpg');

            $image = Image::factory($file_name);
            $image->resize(500, NULL);
            $image->watermark($watermark, 425, 230);
            $image->save($file_name, 100);

            $thumb_file_name = 'public/img/thumb/'.$id.'.jpg';

            if (copy($file_name, $thumb_file_name))	{
                $thumb_image = Image::factory($thumb_file_name);
                $thumb_image->resize(200, NULL);
                $thumb_image->save($thumb_file_name, 100);

                DB::update('products__imgs')
                    ->set(['local_src' => 'http://'. $_SERVER['HTTP_HOST'] . '/' . $file_name])
                    ->where('id', '=', $id)
                    ->execute()
                ;
            }
        }
    }

    /**
     * @return array
     */
    public function getPriceFields()
    {
        $data = [];

        $res = DB::select()
            ->from('prices__fields')
            ->execute()
            ->as_array()
        ;

        foreach ($res as $row) {
            $data[$row['id']] = $row;
        }

        return $data;
    }

    public function zeroPrice()
    {
        DB::delete('store__remain')
            ->where('type', '=', self::PRODUCT_TYPE_PRICE)
            ->execute()
        ;
    }

    public function redactPriceField($id, $name, $column)
    {
        DB::update('prices__fields')
            ->set(['name' => $name, 'column' => $column])
            ->where('id', '=', $id)
            ->execute()
        ;
    }
}