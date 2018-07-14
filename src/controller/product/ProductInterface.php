<?php
namespace controller\product;

/**
 * @author kevinfrantz
 *        
 */
interface ProductInterface
{
    public function list(?string $color = null):void;
}

