<?php
namespace controller\product;

/**
 * @author kevinfrantz
 *        
 */
interface ProductInterface
{
    /**
     * An own Class filter would be better, 
     * but it's to abstract for this concrete exampl ;)
     * @param string $color
     */
    public function colorFilter(string $color):void;
    
    public function list():void;
}

