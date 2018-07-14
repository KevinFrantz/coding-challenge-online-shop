<?php
namespace entity\order;

use Doctrine\Common\Collections\ArrayCollection;
use entity\product\ProductInterface;
use entity\user\UserInterface;
use entity\user\User;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Order implements OrderInterface
{
    /**
     * @var bool
     */
    private $status;
    
    /**
     * 
     * @var ArrayCollection
     */
    private $products;
    
    /**
     * 
     * @var int
     */
    private $id;
    
    /**
     * 
     * @var User
     */
    private $customer;
    
    public function __construct(){
        $this->products = new ArrayCollection();
    }
    
    public function removeProduct(ProductInterface $product): void
    {
        $this->products->remove($product->getId());
    }

    public function addProduct(ProductInterface $product): void
    {
        $this->products->set($product->getId(), $product);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getProducts(): ArrayCollection
    {
        return $this->products;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function setCustomer(UserInterface $customer)
    {
        $this->customer = $customer;
    }

    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    public function getCustomer(): UserInterface
    {
        return $this->customer;
    }
    
    public function setId(int $id): void
    {
        $this->id = $id;
    }

}

