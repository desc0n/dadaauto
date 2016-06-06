<?php

/**
 * Class Model_Action
 */
class Model_Action extends Kohana_Model
{
    /**
     * @param int $actionId
     *
     * @return array|false
     */
    public function getActionData($actionId)
    {
        $res =
            DB::select(
                'cd.*',
                ['ct.name', 'type_name'],
                ['up.name', 'manager_name'],
                ['cal.type', 'action_type']
            )
            ->from(['customers__data', 'cd'])
            ->join(['customers__list', 'cl'])
            ->on('cl.id', '=', 'cd.customers_id')
            ->join(['customers__actions_list', 'cal'])
            ->on('cal.customer_id', '=', 'cl.id')
            ->join(['customers__type', 'ct'])
            ->on('ct.id', '=', 'cd.type')
            ->join(['users__profile', 'up'])
            ->on('up.user_id', '=', 'cl.manager_id')
            ->where('cal.id', '=', $actionId)
            ->execute()
            ->current()
        ;

        return $res;
    }

    /**
     * @param $actionId
     *
     * @return array
     */
    public function getActionProductsData($actionId)
    {
        return DB::select()
            ->from('customers__products')
            ->where('action_id', '=', $actionId)
            ->execute()
            ->as_array()
        ;
    }

    /**
     * @param int $customerId
     * @param string $name
     * @param string $address
     * @param string $tk
     * @param string $phone
     * @param string $email
     * 
     * @return bool
     */
    public function setActionCustomer($customerId, $name, $address, $tk, $phone, $email)
    {
        DB::update('customers__data')
            ->set(['name' => $name, 'address' => $address, 'tk' => $tk, 'phone' => $phone, 'email' => $email])
            ->where('customers_id', '=', $customerId)
            ->execute()
        ;
        
        return true;
    }

    /**
     * @param int $actionId
     * @param int|null $productId
     * @param string $part
     * @param int $quantity
     * @param int $price
     *
     * @return int
     * 
     * @throws Kohana_Exception
     */
    public function addActionProduct($actionId, $productId = null, $part = '', $quantity = 1, $price = 0)
    {
        $res = DB::insert('customers__products', ['action_id', 'product_id', 'part', 'quantity', 'price'])
            ->values([$actionId, $productId, $part, $quantity, $price])
            ->execute()
        ;

        return Arr::get($res, 0);
    }

    /**
     * @param int $actionId
     * @param array $productIdArr
     * @param array $partArr
     * @param array $quantityArr
     * @param array $priceArr
     *
     * @return void
     */
    public function setActionProduct($actionId, $productIdArr, $partArr = [], $quantityArr = [], $priceArr = [])
    {
        foreach ($productIdArr as $i => $productId) {
            $check = DB::select()
                ->from('customers__products')
                ->where('product_id', '=', $productId)
                ->and_where('action_id', '=', $actionId)
                ->execute()
                ->current()
            ;

            if ($check) {
                DB::update('customers__products')
                    ->set(['part' => Arr::get($partArr, $i, ''), 'quantity' => Arr::get($quantityArr, $i, 1), 'price' => Arr::get($priceArr, $i, 0)])
                    ->where('product_id', '=', $productId)
                    ->and_where('action_id', '=', $actionId)
                    ->execute();

                continue;
            }

            $this->addActionProduct($actionId, $productId, Arr::get($partArr, $i, ''), Arr::get($quantityArr, $i, 1), Arr::get($priceArr, $i, 0));
        }
    }

    /**
     * @param int $actionId
     *
     * @return int|null
     */
    public function addSaleFromOrder($actionId)
    {
        $products = $this->getActionProductsData($actionId);

        $res = DB::insert('customers__sales_list', [
                'action_id',
                'manager_id',
                'customer_id',
                'date'
            ])
            ->values([
                $actionId,
                Auth::instance()->get_user()->id,
                DB::select('customer_id')->from('customers__actions_list')->where('id', '=', $actionId)->limit(1),
                DB::expr('now()')
            ])
            ->execute()
        ;

        $saleId = Arr::get($res, 0);

        foreach ($products as $product) {
            DB::insert('customers__sales_products', ['sale_id', 'product_id', 'quantity', 'price', 'date'])
                ->values([
                    $saleId, $product['product_id'], $product['quantity'], $product['price'], DB::expr('now()')
                ])
                ->execute()
            ;
        }

        return $saleId;
    }

    /**
     * @param int $saleId
     */
    public function confirmSale($saleId)
    {
        DB::update('customers__sales_list')
            ->set(['sale_status' => 2])
            ->where('id', '=', $saleId)
            ->execute()
        ;

        $saleProductsData = $this->getSaleProductsData($saleId);
        
        foreach ($saleProductsData as $row) {
            $storeRemain = DB::select()
                ->from('store__remain')
                ->where('product_id', '=', $row['product_id'])
                ->limit(1)
                ->execute()
                ->current()
            ;

            if ($storeRemain) {
                DB::update('store__remain')
                    ->set(['quantity' => (Arr::get($storeRemain, 'quantity', 0) - $row['quantity'])])
                    ->where('id', '=', Arr::get($storeRemain, 'id'))
                    ->execute()
                ;
            }
        }
    }

    /**
     * @param int $saleId
     *
     * @return array
     */
    public function getSaleProductsData($saleId)
    {
        return DB::select('csp.*', ['p.name', 'product_name'])
            ->from(['customers__sales_products', 'csp'])
            ->join(['products', 'p'], 'left')
            ->on('p.id', '=', 'csp.product_id')
            ->where('sale_id', '=', $saleId)
            ->execute()
            ->as_array()
        ;
    }

    /**
     * @param int $saleId
     *
     * @return array|false
     */
    public function getSaleData($saleId)
    {
        $res =
            DB::select(
                'cd.*',
                ['ct.name', 'type_name'],
                ['up.name', 'manager_name']
            )
                ->from(['customers__data', 'cd'])
                ->join(['customers__list', 'cl'])
                ->on('cl.id', '=', 'cd.customers_id')
                ->join(['customers__sales_list', 'csl'])
                ->on('cal.customer_id', '=', 'cl.id')
                ->join(['customers__type', 'ct'])
                ->on('ct.id', '=', 'cd.type')
                ->join(['users__profile', 'up'])
                ->on('up.user_id', '=', 'cl.manager_id')
                ->where('cal.id', '=', $saleId)
                ->execute()
                ->current()
        ;

        return $res;
    }
}