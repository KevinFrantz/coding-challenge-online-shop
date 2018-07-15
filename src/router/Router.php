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

    const CONTROLLER = 'controller';

    const ACTION = 'action';

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
        /**
         * From a security perspective this try catch is not a good idea
         * It's just here for usability reasons and to save code ;)
         */
        try {
            if ($this->get) {
                switch ($this->get[self::CONTROLLER]) {
                    case 'user':
                        $userController = new User($this->core);
                        switch ($this->get[self::ACTION]) {
                            case 'login':
                                return $userController->login();
                            case 'logout':
                                return $userController->logout();
                            case 'register':
                                return $userController->register();
                        }
                    case 'product':
                        $productController = new Product($this->core);
                        switch ($this->get[self::ACTION]) {
                            case 'list':
                                return $productController->list(($this->get['color']) ? $this->get['color'] : null);
                        }
                    case 'order':
                        $orderController = new Order($this->core);
                        switch ($this->get[self::ACTION]) {
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
        } catch (\Exception $exception) {
            $this->echoException($exception);
        }
    }
    
    private function echoException(\Exception $exception):void{
        echo $this->core->getTwig()->render('frames/exception.html.twig', [
            'message' => $exception->getMessage()
        ]);
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

