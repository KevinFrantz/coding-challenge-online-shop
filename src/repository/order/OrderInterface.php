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
    public function saveOrder(OrderEntityInterface $order):bool;
}

