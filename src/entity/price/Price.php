<?php
namespace entity\price;

use entity\currency\CurrencyInterface;
use entity\currency\Euro;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Price implements PriceInterface
{
    /**
     * 
     * @var int|null
     */
    private $tax;
    
    /**
     * 
     * @var int
     */
    private $netto;
    
    public function getGross(): CurrencyInterface
    {
        $gross = new Euro();
        $gross->setCents($this->netto->getCents()*(100+$this->tax)/100);
        return $gross;
    }

    public function getNetto(): CurrencyInterface
    {
        return $this->netto;
    }

    public function setPrice(CurrencyInterface $netto): void
    {
       $this->netto = $netto;
    }
    
    public function setTax(int $percent): void
    { 
        $this->tax = $percent;
    }
    public function getTax(): int
    {
        return $this->tax;
    }

}

