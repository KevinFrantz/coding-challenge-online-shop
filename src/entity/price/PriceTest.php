<?php
namespace entity\price;

use PHPUnit\Framework\TestCase;
use entity\currency\Euro;

/**
 *
 * @author kevinfrantz
 *        
 */
class PriceTest extends TestCase
{
    const NETTO = 100;
    
    const GROSS = 119;
    
    const TAX   = 19;
    
    /**
     * 
     * @var Price
     */
    protected $price;
    
    /**
     * 
     * @var Euro
     */
    protected $nettoEuro;
    
    protected function setUp():void{
        $this->nettoEuro = new Euro();
        $this->nettoEuro->setCents(100);
        $this->price = new Price();
        $this->price->setTax(self::TAX);
        $this->price->setPrice($this->nettoEuro);
    }
    
    public function testNetto():void{
        $this->assertEquals(self::NETTO, $this->price->getNetto()->getCents());
    }
    
    public function testGross():void{
        $this->assertEquals(self::GROSS, $this->price->getGross()->getCents());
    }
    
    public function testTax():void{
        $this->assertEquals(self::TAX, $this->price->getTax());
    }
}