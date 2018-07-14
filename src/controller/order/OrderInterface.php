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
    
    public function basket():void;
    
    public function selectPaymentMethod():void;
}