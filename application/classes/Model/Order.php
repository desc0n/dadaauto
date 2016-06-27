<?php

/**
 * Class Model_Order
 */
class Model_Order extends Kohana_Model
{
    public function getOrderData($orderId)
    {
        return DB::select(
                ['o.id', 'order_id'],
                ['oc.name', 'client_name'],
                ['oc.address', 'client_address'],
                ['oc.tk', 'client_tk'],
                ['oc.phone', 'client_phone'],
                ['oc.email', 'client_email']
            )
            ->from(['orders', 'o'])
            ->join(['orders__clients', 'oc'])
            ->on('oc.order_id', '=', 'o.id')
            ->join(['orders__cars', 'ocars'])
            ->on('ocars.order_id', '=', 'o.id')
            ->join(['orders__parts', 'op'], 'left')
            ->on('op.order_id', '=', 'o.id')
            ->where('o.id', '=', $orderId)
            ->execute()
            ->current()
        ;
    }

    /**
     * @param int $orderId
     *
     * @return array
     */
    public function getOrderProductsData($orderId)
    {
        return DB::select()
            ->from('orders__parts')
            ->where('order_id', '=', $orderId)
            ->execute()
            ->as_array()
        ;
    }

    public function findNotPayedOrders($startedAt, $finishedAt)
    {
        $data = [];

        $startDate = DateTime::createFromFormat('d.m.Y', null != $startedAt ? $startedAt : date('d.m.Y'));
        $endDate = DateTime::createFromFormat('d.m.Y', null != $finishedAt ? $finishedAt : date('d.m.Y'));

        $start = null != $startedAt ? $startDate->format('Y-m-d H:i:s') : $startDate->modify('- 1 week')->format('Y-m-d H:i:s');
        $end = $endDate->format('Y-m-d H:i:s');
        
        $res = DB::select(
                ['o.id', 'order_id'],
                'o.date',
                ['oc.name', 'client_name'],
                ['oc.address', 'client_address'],
                ['oc.tk', 'client_tk'],
                ['oc.phone', 'client_phone'],
                ['oc.email', 'client_email']
            )
            ->from(['orders', 'o'])
            ->join(['orders__clients', 'oc'])
            ->on('oc.order_id', '=', 'o.id')
            ->where('o.date', 'between', [$start, $end])
            ->execute()
            ->as_array()
        ;

        foreach ($res as $row) {
            $data[$row['order_id']] = $row;

            $data[$row['order_id']]['order_price'] = 0;

            foreach ($this->getOrderProductsData($row['order_id']) as $partData) {
                $data[$row['order_id']]['order_price'] += $partData['quantity'] * $partData['price'];
            }
        }

        return $data;
    }
}