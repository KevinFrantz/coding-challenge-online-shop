<?php
namespace entity\currency;

/**
 *
 * @author kevinfrantz
 *        
 */
interface CurrencyInterface
{
    /**
     * Sets the value of the currency
     * @param int $cents
     */
    public function setCents(int $cents):void;
    
    /**
     * Returns the currency value in cents
     * @return int
     */
    public function getCents():int;
    
    /**
     * Returns the currency value as float (rounded on two decimal behind the )
     * @return float
     */
    public function getFloat():float;
    
    /**
     * Returns the name of the currency
     * @return string
     */
    public function getName():string;
    
    /**
     * Returns the symbol of the currency
     * @return string
     */
    public function getSymbol():string;
}

