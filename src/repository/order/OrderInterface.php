<?php
namespace repository\order;

use entity\order\OrderInterface as OrderEntityInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
interface OrderInterface
{
    public function saveOrder(OrderEntityInterface $order):void;
    
    /**
     * This function just exists for maintaining reasons
     */
    public function deleteAllOrders():void;
}

