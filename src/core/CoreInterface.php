<?php
namespace core;

use entity\user\UserInterface;
use entity\order\Order;

/**
 *
 * @author kevinfrantz
 *        
 */
interface CoreInterface
{

    public function getDatabase(): \PDO;

    public function getTwig(): \Twig_Environment;

    public function getUser(): ?UserInterface;

    public function setUser(?UserInterface $user = null): void;

    public function getBasket(): Order;

    public function setBasket(Order $basket): void;
}
