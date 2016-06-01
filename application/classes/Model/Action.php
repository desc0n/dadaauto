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
                ['up.name', 'manager_name']
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
     * @param string $part
     * @param int $quantity
     * @param int $price
     *
     * @return int
     * 
     * @throws Kohana_Exception
     */
    public function addActionProduct($actionId, $part = '', $quantity = 1, $price = 0)
    {
        $res = DB::insert('customers__products', ['action_id', 'part', 'quantity', 'price'])
            ->values([$actionId, $part, $quantity, $price])
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
                ->where('id', '=', $productId)
                ->and_where('action_id', '=', $actionId)
                ->execute()
                ->current()
            ;

            if ($check) {
                DB::update('customers__products')
                    ->set(['part' => Arr::get($partArr, $i, ''), 'quantity' => Arr::get($quantityArr, $i, 1), 'price' => Arr::get($priceArr, $i, 0)])
                    ->where('id', '=', $productId)
                    ->and_where('action_id', '=', $actionId)
                    ->execute();

                continue;
            }

            $this->addActionProduct($actionId, Arr::get($partArr, $i, ''), Arr::get($quantityArr, $i, 1), Arr::get($priceArr, $i, 0));
        }
    }
}