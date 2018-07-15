<?php
namespace controller\order;

use controller\AbstractDefaultController;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Order extends AbstractDefaultController implements OrderInterface
{
    public function addProduct(): void
    {}

    public function store(): void
    {}

    public function basket(): void
    {
        $this->render('order/basket.html.twig',['basket'=>$this->core->getBasket()]);
    }

    public function selectPaymentMethod(): void
    {}
}

