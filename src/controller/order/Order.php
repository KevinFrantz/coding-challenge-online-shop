<?php
namespace controller\order;

use controller\AbstractDefaultController;
use core\CoreInterface;
use repository\order\OrderInterface as OrderRepositoryInterface;
use repository\product\ProductInterface as ProductRepositoryInterface;
use repository\product\Product as ProductRepository;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Order extends AbstractDefaultController implements OrderInterface
{

    /**
     *
     * @var OrderRepositoryInterface
     */
    protected $orderRepository;

    /**
     *
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    public function __construct(CoreInterface $core)
    {
        parent::__construct($core);
        $this->productRepository = new ProductRepository($this->core);
    }

    private function addProduct(): void
    {
        $this->core->getBasket()->addProduct($this->productRepository->getById($this->post['add']));
    }

    private function store(): void
    {}

    public function basket(): void
    {
        if ($this->post) {
            $this->postRoutine();
        }
        $this->render('order/basket.html.twig', [
            'basket' => $this->core->getBasket()
        ]);
    }

    private function postRoutine(): void
    {
        if ($this->post['add']) {
            $this->addProduct();
        }
    }

    public function selectPaymentMethod(): void
    {}
}

