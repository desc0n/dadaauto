<?php

/**
 * Class Model_Order
 */
class Model_Order extends Kohana_Model
{
    public function getOrderData($orderId)
    {
        return DB::select(['oc.name', 'client_name'])
            ->from(['orders', 'o'])
            ->join(['orders__clients', 'oc'])
            ->on('oc.order_id', '=', 'o.id')
            ->join(['orders__cars', 'ocars'])
            ->on('ocars.order_id', '=', 'o.id')
            ->join(['orders__parts', 'op'])
            ->on('op.order_id', '=', 'o.id')
            ->where('o.id', '=', $orderId)
            ->execute()
            ->current()
        ;
    }

    public function getOrderProductsData($orderId)
    {
        return DB::select()
            ->from('orders__parts')
            ->where('order_id', '=', $orderId)
            ->execute()
            ->as_array()
        ;
    }
}