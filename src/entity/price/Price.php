<?php
namespace entity\price;

use entity\currency\CurrencyInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Price implements PriceInterface
{
    public function getGross(): CurrencyInterface
    {}

    public function getNetto(): CurrencyInterface
    {}

    public function setPrice(CurrencyInterface $price): void
    {}

}

