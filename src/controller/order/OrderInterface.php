<?php
namespace controller\order;

/**
 * @author kevinfrantz
 *        
 */
interface OrderInterface
{
    /**
     * Saves the order
     */
    public function store():void;
    
    public function addProduct():void;
    
    public function showBasket():void;
    
    public function selectPaymentMethod():void;
}