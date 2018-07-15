<?php
namespace controller\order;

use controller\AbstractDefaultController;
use core\CoreInterface;
use repository\order\OrderInterface as OrderRepositoryInterface;
use repository\product\ProductInterface as ProductRepositoryInterface;
use repository\product\Product as ProductRepository;
use entity\payment\AbstractPayment;
use repository\order\Order as OrderRepository;
use entity\order\Order as OrderEntity;

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
        $this->orderRepository = new OrderRepository($this->core);
    }

    private function addProduct(): void
    {
        $this->core->getBasket()->addProduct($this->productRepository->getById($this->post['add']));
    }

    private function store(): void
    {
        if(!$this->core->getUser()){
            throw new \Exception('Just registered users can order!');
        }
        $this->core->getBasket()->setCustomer($this->core->getUser());
        if ($this->orderRepository->saveOrder($this->core->getBasket())) {
            $this->core->setBasket(new OrderEntity());
        } else {
            throw new \Exception('Order could not be saved!');
        }
    }

    public function basket(): void
    {
        if ($this->post) {
            $this->postRoutine();
        }
        $this->render('order/basket.html.twig', [
            'basket' => $this->core->getBasket(),
            'payment_methods' => AbstractPayment::getPaymentMethods()
        ]);
    }

    private function postRoutine(): void
    {
        if ($this->post['add']) {
            $this->addProduct();
        }
        if ($this->post['store']) {
            $this->store();
        }
    }
}

