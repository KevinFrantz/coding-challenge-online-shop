<?php
namespace entity\payment\method1;

use PHPUnit\Framework\TestCase;

/**
 *
 * @author kevinfrantz
 *        
 */
class Method1Test extends TestCase
{
    public function testName():void{
        $this->assertEquals(Method1::getName(), 'method1');
    }
}

