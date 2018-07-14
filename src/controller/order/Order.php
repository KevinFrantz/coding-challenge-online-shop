<?php
namespace controller\order;

use controller\AbstractController;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Order extends AbstractController implements OrderInterface
{
    public function addProduct(): void
    {}

    public function store(): void
    {}

    public function basket(): void
    {}

    public function selectPaymentMethod(): void
    {}
}

