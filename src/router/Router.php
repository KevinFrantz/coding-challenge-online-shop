<?php
namespace router;

use core\CoreInterface;
use controller\standart\Standart;
use controller\user\User;
use controller\product\Product;
use controller\order\Order;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Router implements RouterInterface
{

    /**
     *
     * @var CoreInterface
     */
    private $core;

    /**
     *
     * @var array
     */
    private $get;

    /**
     * All get Parameters should be visible in this function for overview reasons
     * This Router uses switchs.
     * It's not a good practice, but for this use case ok
     *
     * {@inheritdoc}
     * @see \router\RouterInterface::route()
     */
    public function route()
    {
        if ($this->get) {
            switch ($this->get['controller']) {
                case 'user':
                    $userController = new User();
                    switch ($this->get['action']) {
                        case 'login':
                            return $userController->login();
                        case 'logout':
                            return $userController->logout();
                        case 'register':
                            return $userController->register();
                    }
                case 'product':
                    $productController = new Product($this->core);
                    switch ($this->get['action']) {
                        case 'list':
                            return $productController->list();
                        case 'color':
                            return $productController->colorFilter($this->get['color']);
                    }
                case 'order':
                    $orderController = new Order($this->core);
                    switch ($this->get['action']){
                        case 'store':
                            return $orderController->store();
                        case 'basket':
                            return $orderController->basket();
                        case 'payment':
                            return $orderController->selectPaymentMethod();
                        case 'add-product':
                            return $orderController->addProduct();
                    }
            }
        } else {
            $standartController = new Standart($this->core);
            return $standartController->homepage();
        }
        throw new \Exception('Route not found!');
    }

    public function setGet(array $get): void
    {
        $this->get = $get;
    }

    public function setCore(CoreInterface $core): void
    {
        $this->core = $core;
    }
}

