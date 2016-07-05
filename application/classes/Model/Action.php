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
                ['cal.type', 'action_type'],
                [DB::select('id')->from('customers__sales_delivery')->where('action_id', '=', DB::expr('cal.id'))->limit(1), 'delivery_id']
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
     * @param int|null $storeRemainId
     * @param string $part
     * @param int $quantity
     * @param int $price
     *
     * @return int
     * 
     * @throws Kohana_Exception
     */
    public function addActionProduct($actionId, $storeRemainId = null, $part = '', $quantity = 1, $price = 0)
    {
        $res = DB::insert('customers__products', ['action_id', 'store_remain_id', 'part', 'quantity', 'price'])
            ->values([$actionId, empty($storeRemainId) ? null : $storeRemainId, $part, $quantity, $price])
            ->execute()
        ;

        return Arr::get($res, 0);
    }

    /**
     * @param int $actionId
     * @param array $storeRemainIdArr
     * @param array $partArr
     * @param array $quantityArr
     * @param array $priceArr
     *
     * @return void
     */
    public function setActionProduct($actionId, $storeRemainIdArr, $partArr = [], $quantityArr = [], $priceArr = [])
    {
        foreach ($storeRemainIdArr as $i => $storeRemainId) {
            $check = DB::select()
                ->from('customers__products')
                ->where('store_remain_id', '=', $storeRemainId)
                ->and_where('action_id', '=', $actionId)
                ->execute()
                ->current()
            ;

            if ($check) {
                DB::update('customers__products')
                    ->set(['part' => Arr::get($partArr, $i, ''), 'quantity' => Arr::get($quantityArr, $i, 1), 'price' => Arr::get($priceArr, $i, 0)])
                    ->where('store_remain_id', '=', $storeRemainId)
                    ->and_where('action_id', '=', $actionId)
                    ->execute();

                continue;
            }

            $this->addActionProduct($actionId, $storeRemainId, Arr::get($partArr, $i, ''), Arr::get($quantityArr, $i, 1), Arr::get($priceArr, $i, 0));
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
            DB::insert('customers__sales_products', ['sale_id', 'product_id', 'store_remain_id', 'quantity', 'price', 'date'])
                ->values([
                    $saleId, $product['product_id'], $product['store_remain_id'], $product['quantity'], $product['price'], DB::expr('now()')
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
        return DB::select(
                'csp.*', 
                ['p.name', 'product_name'],
                [DB::expr("concat(p.name, ' (', p.article, ')')"), 'full_product_name']
            )
            ->from(['customers__sales_products', 'csp'])
            ->join(['store__remain', 'sr'])
            ->on('sr.id', '=', 'csp.store_remain_id')
            ->join(['products', 'p'], 'left')
            ->on('p.id', '=', 'sr.product_id')
            ->where('csp.sale_id', '=', $saleId)
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
                ->on('csl.customer_id', '=', 'cl.id')
                ->join(['customers__type', 'ct'])
                ->on('ct.id', '=', 'cd.type')
                ->join(['users__profile', 'up'])
                ->on('up.user_id', '=', 'cl.manager_id')
                ->where('csl.id', '=', $saleId)
                ->execute()
                ->current()
        ;

        return $res;
    }

    /**
     * @param string $startedAt
     * @param string $finishedAt
     *
     * @return array
     */
    public function findNotPayedOrders($startedAt, $finishedAt)
    {
        $data = [];

        $startDate = DateTime::createFromFormat('d.m.Y', null != $startedAt ? $startedAt : date('d.m.Y'));
        $endDate = DateTime::createFromFormat('d.m.Y', null != $finishedAt ? $finishedAt : date('d.m.Y'));

        $start = null != $startedAt ? $startDate->format('Y-m-d H:i:s') : $startDate->modify('- 1 week')->format('Y-m-d H:i:s');
        $end = $endDate->format('Y-m-d H:i:s');

        $res = DB::select(
            ['cal.id', 'action_id'],
            'cal.date',
            [DB::select(DB::expr('sum(pl.price)'))->from(['payment__log', 'pl'])->where('pl.action_id', '=', DB::expr('cal.id')), 'payed_price']
        )
            ->from(['customers__actions_list', 'cal'])
            ->where('cal.date', 'between', [$start, $end])
            ->and_where('cal.type', '=', 2)
            ->and_where('cal.id', 'not in', DB::select('action_id')->from('payment__log')->where('payed_status', '=', true))
            ->execute()
            ->as_array()
        ;

        foreach ($res as $row) {
            $data[$row['action_id']] = $row;

            $data[$row['action_id']]['action_price'] = $this->getActionPrice($row['action_id']);
        }

        return $data;
    }

    /**
     * @param int $actionId
     *
     * @return int
     */
    public function getActionPrice($actionId)
    {
        $price = 0;

        foreach ($this->getActionProductsData($actionId) as $partData) {
            $price += $partData['quantity'] * $partData['price'];
        }

        return $price;
    }

    /**
     * @param string $startedAt
     * @param string $finishedAt
     * 
     * @return array
     */
    public function findAllSales($startedAt, $finishedAt)
    {
        $data = [];

        $startDate = DateTime::createFromFormat('d.m.Y', null != $startedAt ? $startedAt : date('d.m.Y'));
        $endDate = DateTime::createFromFormat('d.m.Y', null != $finishedAt ? $finishedAt : date('d.m.Y'));

        $start = null != $startedAt ? $startDate->format('Y-m-d H:i:s') : $startDate->modify('- 1 week')->format('Y-m-d H:i:s');
        $end = $endDate->format('Y-m-d H:i:s');

        $res =
            DB::select('csl.*')
            ->from(['customers__sales_list', 'csl'])
            ->where('csl.date', 'between', [$start, $end])
            ->execute()
            ->as_array()
        ;

        foreach ($res as $row) {
            $data[$row['id']] = $row;

            $data[$row['id']]['sale_price'] = $this->getSalePrice($row['id']);
        }

        return $data;
    }

    /**
     * @param int $saleId
     *
     * @return int
     */
    public function getSalePrice($saleId)
    {
        $price = 0;

        foreach ($this->getSaleProductsData($saleId) as $partData) {
            $price += $partData['quantity'] * $partData['price'];
        }

        return $price;
    }

    /**
     * @param int $saleId
     * 
     * @return int|null
     * 
     * @throws Kohana_Exception
     */
    public function addSaleDelivery($saleId)
    {
        $saleData = $this->getActionData($saleId);

        $res = DB::insert('customers__sales_delivery', [
                'action_id',
                'customer_phone',
                'customer_name',
                'customer_address',
                'customer_tk',
                'status',
                'updated_at'
            ])
            ->values([
                $saleId,
                Arr::get($saleData, 'phone', ''),
                Arr::get($saleData, 'name', ''),
                Arr::get($saleData, 'address', ''),
                Arr::get($saleData, 'tk', ''),
                'in_progress',
                DB::expr('now()')
            ])
            ->execute()
        ;
        
        return Arr::get($res, 0);
    }
}