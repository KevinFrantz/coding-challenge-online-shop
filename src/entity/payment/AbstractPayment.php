<?php
namespace entity\payment;

use Doctrine\Common\Collections\ArrayCollection;
use entity\payment\method1\Method1;
use entity\payment\method2\Method2;

/**
 *
 * @author kevinfrantz
 *        
 */
abstract class AbstractPayment implements PaymentInterface
{
    /**
     * Returns all available Payment methods
     * @return ArrayCollection
     */
    public static function getPaymentMethods(): ArrayCollection
    {
        return new ArrayCollection([
            'method1'=>new Method1(),
            'method2'=>new Method2()
        ]);
    }
}

