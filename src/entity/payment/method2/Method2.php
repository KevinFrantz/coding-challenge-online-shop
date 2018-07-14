<?php
namespace entity\payment\method2;

use entity\payment\AbstractPayment;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Method2 extends AbstractPayment
{
    public static function getName(): string
    {
        return 'method2';
    }
}

