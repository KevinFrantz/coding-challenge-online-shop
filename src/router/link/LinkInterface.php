<?php
namespace router\link;

/**
 *
 * @author kevinfrantz
 *        
 */
interface LinkInterface
{
    public function getName():string;
    
    public function getUrl():string;
    
    public function isActive():bool;
}

