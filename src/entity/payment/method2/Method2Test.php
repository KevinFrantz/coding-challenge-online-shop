<?php
namespace entity\payment\method2;

use PHPUnit\Framework\TestCase;

/**
 *
 * @author kevinfrantz
 *        
 */
class Method2Test extends TestCase
{
    public function testName():void{
        $this->assertEquals(Method2::getName(), 'method2');
    }
}

