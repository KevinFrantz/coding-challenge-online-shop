<?php
namespace entity\price;

use entity\currency\CurrencyInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
interface PriceInterface
{
    /**
     * Sets the price
     * @param CurrencyInterface $price
     */
    public function setPrice(CurrencyInterface $price):void;
    
    /**
     * Returns the netto price
     * @return int
     */
    public function getNetto():CurrencyInterface;
    
    /**
     * Returns the gross price
     * @return int
     */
    public function getGross():CurrencyInterface;
}

