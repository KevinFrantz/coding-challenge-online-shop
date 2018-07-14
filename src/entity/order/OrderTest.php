<?php
namespace entity\order;

use PHPUnit\Framework\TestCase;
use entity\user\User;
use entity\product\Product;

/**
 *
 * @author kevinfrantz
 *        
 */
class OrderTest extends TestCase
{
    const ID = '123456';
    
    /**
     * 
     * @var Order
     */
    protected $order;
    
    /**
     * 
     * @var User
     */
    protected $customer;
    
    /**
     * 
     * @var Product
     */
    protected $product;
    
    protected function setUp():void{
        $this->order = new Order();
        $this->customer = new User();
        $this->product = new Product();
        $this->product->setId(1234);
        $this->order->setId('123456');
        $this->order->setCustomer($this->customer);
        $this->order->setStatus(true);
        $this->order->addProduct($this->product);
    }
    
    public function testId():void{
        $this->assertEquals(self::ID, $this->order->getId());
    }
    
    public function testCustomer():void{
        $this->assertEquals($this->customer, $this->order->getCustomer());
    }
    
    public function testStatus():void{
        $this->assertEquals(true, $this->order->getStatus());
    }
    
    public function testAdd():void{
        $this->assertEquals($this->product, $this->order->getProducts()->get($this->product->getId()));
    }
    
    public function testRemove():void{
        $this->order->removeProduct($this->product);
        $this->assertEquals(false, $this->order->getProducts()->contains($this->product));
    }
}

