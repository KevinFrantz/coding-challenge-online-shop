<?php
namespace entity\product;

use entity\price\PriceInterface;
use entity\image\ImageInterface;
use entity\UniqueInterface;

/**
 * Attention:
 * This interface containes the accercors for color.
 * In a real application I wouldn't hardcode acceccors for a special attribute into the product.
 * Instead I would make an ArrayCollection $attributes which containes all of the product attributes. 
 * @author kevinfrantz
 *        
 */
interface ProductInterface extends UniqueInterface
{
    /**
     * @return PriceInterface
     */
    public function getPrice():PriceInterface;
    
    /**
     * @param PriceInterface $price
     */
    public function setPrice(PriceInterface $price):void;
    
    /**
     * @param ImageInterface $image
     */
    public function setImage(ImageInterface $image):void;
    
    /**
     * @return ImageInterface
     */
    public function getImage():ImageInterface;
    
    /**
     * @return string
     */
    public function getName():string;
    
    /**
     * @param string $name
     */
    public function setName(string $name):void;
    
    /**
     * @return string
     */
    public function getColor():string;
    
    /**
     * @param string $color
     */
    public function setColor(string $color):void;
}

