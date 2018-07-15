<?php
namespace repository\order;

use PHPUnit\Framework\TestCase;
use core\Core;
use entity\user\User;
use repository\order\Order as OrderRepository;
use entity\order\Order as OrderEntity;

/**
 *
 * @author kevinfrantz
 *        
 */
class OrderTest extends TestCase
{
    /**
     * @var OrderRepository
     */
    protected $repository;
    
    /**
     * 
     * @var Core
     */
    protected $core;
    
    /**
     * @var OrderEntity
     */
    protected $order;
    
    protected function setUp():void{
        $this->core = new Core();
        $user = new User();
        $user->setId(1);
        $this->core->setUser($user);
        $this->repository = new OrderRepository($this->core);
        $this->order = new OrderEntity();
        $this->order->setCustomer($user);
    }
    
    public function testEntitySaver():void{
        $this->repository->saveOrder($this->order);
        $this->assertGreaterThan(0,$this->order->getId());
    }
}

