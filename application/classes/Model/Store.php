<?php

class Model_Store extends Kohana_Model
{
    public $productsType = [
        'new'           => 'Новая',
        'contract'      => 'Контрактная'
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

        return $storeRemainId;
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
}