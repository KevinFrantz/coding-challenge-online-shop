<?php
namespace core;

use entity\user\UserInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
interface CoreInterface
{
    public function getDatabase():\PDO;
    
    public function getTwig():\Twig_Environment;
    
    public function getUser():?UserInterface;
    
    public function setUser(?UserInterface $user = null):void;
}

