<?php
namespace entity\color;

/**
 * In a real Application color would be saved in the database
 * Otherwise it's agains "Normalisierung" ;) 
 * @author kevinfrantz
 *        
 */
interface ColorInterface
{
    public function setColor(string $color):void;

    public function getColor():string;
}

