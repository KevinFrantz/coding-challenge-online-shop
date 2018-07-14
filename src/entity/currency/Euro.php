<?php
namespace entity\currency;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Euro implements CurrencyInterface
{
    /**
     * 
     * @var int
     */
    private $cents;
    
    public function getName(): string
    {
        return 'Euro';
    }

    public function getCents(): int
    {
        return $this->cents;
    }

    public function setCents(int $cents): void
    {
        $this->cents = $cents;
    }

    public function getFloat(): float
    {
        return ($this->cents/100);
    }

    public function getSymbol(): string
    {
        return '€';  
    }
}

