<?php
namespace entity\payment;

/**
 *
 * @author kevinfrantz
 *        
 */
interface PaymentInterface
{
    /**
     * Returns the name of the payment Method
     * @return string
     */
    public static function getName():string;
}

