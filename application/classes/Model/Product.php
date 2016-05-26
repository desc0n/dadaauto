<?php

/**
 * Class Model_Product
 */
class Model_Product extends Kohana_Model
{
    public $distributorsType = [
        'realtime'  => 'В наличии',
        'offer'     => 'Под заказ'
    ];

    /**
     * @param null|int $id
     * @param null|string $brand
     * @param null|string $subBrand
     * 
     * @return array
     */
    public function findBrands($id = null, $brand = null, $subBrand = null)
    {
        /** @var Database_Query_Builder_Select $query */
        $query = DB::select()
            ->from('products__brands')
            ->where('', '', 1)
        ;

        $query = null !== $id ? $query->and_where('id', '=', $id) : $query;
        $query = null !== $brand ? $query->and_where('name', '=', $brand) : $query;
        $query = null !== $subBrand ? $query->and_where('name', 'like', sprintf('%%%s%%', $subBrand)) : $query;

        return $query->execute()->as_array();
    }

    /**
     * @param null|int $id
     * @param null|string $name
     * 
     * @return array
     */
    public function findDistributors($id = null, $name = null)
    {
        /** @var Database_Query_Builder_Select $query */
        $query = DB::select()
            ->from('products__distributors')
            ->where('', '', 1)
        ;

        $query = null !== $id ? $query->and_where('id', '=', $id) : $query;
        $query = null !== $name ? $query->and_where('name', '=', $name) : $query;

        return $query->execute()->as_array();
    }

    /**
     * @param string $name
     * @param string $type
     * 
     * @return int|null
     * 
     * @throws Kohana_Exception
     */
    public function addDistributor($name, $type)
    {
        $res = DB::insert('products__distributors', ['name', 'type'])
            ->values([$name, $type])
            ->execute()
        ;
        
        return Arr::get($res, 0);
    }

    /**
     * @param null|int $id
     * @param null|int $brandId
     * @param null|string $article
     * @param null|string $name
     *
     * @return array
     */
    public function findProduct($id = null, $brandId = null, $article = null, $name = null)
    {
        /** @var Database_Query_Builder_Select $query */
        $query = DB::select()
            ->from('products')
            ->where('', '', 1)
        ;

        $query = null !== $id ? $query->and_where('id', '=', $id) : $query;
        $query = null !== $brandId ? $query->and_where('brand_id', '=', $brandId) : $query;
        $query = null !== $article ? $query->and_where('article', '=', $article) : $query;
        $query = null !== $name ? $query->and_where('name', '=', $name) : $query;

        return $query->execute()->as_array();
    }

    /**
     * @param string $name
     *
     * @return int|null
     *
     * @throws Kohana_Exception
     */
    public function addBrand($name)
    {
        $res = DB::insert('products__brands', ['name'])
            ->values([strtoupper($name)])
            ->execute()
        ;

        return Arr::get($res, 0);
    }
    
    /**
     * @param int $brandId
     * @param string $article
     * @param string $name
     *
     * @return int|null
     *
     * @throws Kohana_Exception
     */
    public function addProduct($brandId, $article, $name)
    {
        $res = DB::insert('products', ['brand_id', 'article', 'name'])
            ->values([$brandId, strtoupper($article), $name])
            ->execute()
        ;

        return Arr::get($res, 0);
    }
}