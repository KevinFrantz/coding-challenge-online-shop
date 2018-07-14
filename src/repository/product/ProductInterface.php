<?php
namespace repository\product;

use Doctrine\Common\Collections\ArrayCollection;
use entity\product\ProductInterface as ProductEntityInterface;
/**
 *
 * @author kevinfrantz
 *        
 */
interface ProductInterface
{
    public function getAllProducts():ArrayCollection;
    
    public function addProducts(ArrayCollection $products):void;
    
    public function getProductById(int $id):ProductEntityInterface;
}

