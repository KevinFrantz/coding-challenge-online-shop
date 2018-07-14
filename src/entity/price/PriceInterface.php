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
    public function setPrice(CurrencyInterface $netto):void;
    
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
    
    public function setTax(int $percent):void;
    
    public function getTax():int;
}

