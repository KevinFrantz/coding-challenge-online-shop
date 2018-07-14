<?php
namespace router;

use core\CoreInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
interface RouterInterface
{
    public function setCore(CoreInterface $core):void;
    
    /**
     * Get Parameters are used to request Data
     * @param array $get
     */
    public function setGet(array $get):void;

    /**
     * Opens the controller
     * @return mixed 
     */
    public function route();
}
