<?php
namespace entity;

/**
 * This interface is needed for handling unique entities.
 * Unique entities are defined by an id
 * @author kevinfrantz
 *        
 */
interface UniqueInterface
{
    /**
     * @return int
     */
    public function getId():int;
    
    /**
     * @param int $id
     */
    public function setId(int $id):void;
}

