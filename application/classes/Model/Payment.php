<?php

/**
 * Class Model_Payment
 */
class Model_Payment extends Kohana_Model
{
    /**
     * @return array
     */
    public function findAll()
    {
        return DB::select()
            ->from('payment__log')
            ->execute()
            ->as_array()
        ;
    }

    /**
     * @var int $action_id
     *
     * @return array
     */
    public function findByAction($action_id)
    {
        return DB::select()
            ->from('payment__log')
            ->where('action_id', '=', $action_id)
            ->execute()
            ->as_array()
        ;
    }
    
    public function addLog($action_id, $price, $type)
    {
        /** @var $actionModel Model_Action */
        $actionModel = Model::factory('Action');
        
        $actionPrice = $actionModel->getActionPrice($action_id);
        
        $issetPayment = 0;
        $rootPaymentLog = $this->findByAction($action_id);
        
        foreach ($rootPaymentLog as $log) {
            $issetPayment += $log['price'];
        }
        
        $res = DB::insert('payment__log', [
                'action_id', 'type', 'price', 'payed_status', 'date'
            ])
            ->values([
                $action_id,
                $type,
                $price,
                $actionPrice <= ($price + $issetPayment), 
                DB::expr('now()')
            ])
            ->execute()
        ;
        
        return Arr::get($res, 0);
    }
}