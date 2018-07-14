<?php
namespace entity\payment\method1;

use entity\payment\AbstractPayment;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Method1 extends AbstractPayment
{
    public static function getName(): string
    {
        return 'method1';
    }
}

