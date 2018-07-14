<?php
namespace entity\order;

use entity\product\ProductInterface;
use Doctrine\Common\Collections\ArrayCollection;
use entity\user\UserInterface;
use entity\UniqueInterface;

/**
 * Status in this class is bool
 * True when order is finished
 * Fales when order is open
 * 
 * In a real application an entity status would be helpfull ;)
 * 
 * Order and basket are in this case the same entity. Designwise an other solution may would be better.
 * E.g. entity basket as an attribut of order. 
 * 
 * @author kevinfrantz
 *        
 */
interface OrderInterface extends UniqueInterface
{
    /**
     * @param ProductInterface $product
     */
    public function addProduct(ProductInterface $product):void;
    
    /**
     * @param ProductInterface $product
     */
    public function removeProduct(ProductInterface $product):void;
    
    /**
     * @return ArrayCollection
     */
    public function getProducts():ArrayCollection;
    
    /**
     * @return UserInterface
     */
    public function getCustomer():UserInterface;
    
    /**
     * @param UserInterface $customer
     */
    public function setCustomer(UserInterface $customer);
    
    /**
     * @param bool $status
     */
    public function setStatus(bool $status):void;
    
    /**
     * @return bool
     */
    public function getStatus():bool;
}