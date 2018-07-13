<?php
namespace entity\payment;

use entity\order\OrderInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
interface PaymentInterface
{
    public function pay(OrderInterface $order):void;
}

