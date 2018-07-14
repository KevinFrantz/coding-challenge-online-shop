<?php
namespace entity\currency;

use PHPUnit\Framework\TestCase;

/**
 *
 * @author kevinfrantz
 *        
 */
class EuroTest extends TestCase
{
    const CENTS = 13301;
    
    const FLOAT = 133.01;
    /**
     * 
     * @var Euro
     */
    protected $euro;
    
    protected function setUp():void{
        $this->euro = new Euro();
        $this->euro->setCents(self::CENTS);
    }
    
    public function testName():void{
        $this->assertEquals('Euro', $this->euro->getName());
    }
    
    public function testSymbol():void{
        $this->assertEquals('€', $this->euro->getSymbol());
    }
    
    public function testCent():void{
        $this->assertEquals(self::CENTS, $this->euro->getCents());
    }
    
    public function testFloat():void{
        $this->assertEquals(self::FLOAT, $this->euro->getFloat());
    }
}

