<?php
namespace repository\product;

use Doctrine\Common\Collections\ArrayCollection;

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
}

