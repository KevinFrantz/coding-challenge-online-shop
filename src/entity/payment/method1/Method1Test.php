<?php
namespace entity\payment\method1;

/**
 *
 * @author kevinfrantz
 *        
 */
class Method1Test
{
    public function testName():void{
        $this->assertEquals(Method1::getName(), 'method1');
    }
}

