<?php
namespace repository\product;

use Doctrine\Common\Collections\ArrayCollection;
use entity\product\ProductInterface as EntityProductInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
interface ProductInterface
{
    public function getAllProducts():ArrayCollection;
    
    public function addProducts(ArrayCollection $products):void;
    
    public function getColors():array;
    
    public function getAllByColor(string $color):ArrayCollection;
    
    public function getById(int $id):EntityProductInterface;
}

