<?php
namespace controller\order;

/**
 * @author kevinfrantz
 *        
 */
interface OrderInterface
{
    public function basket():void;
    
    public function selectPaymentMethod():void;
}