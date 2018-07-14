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
     * Post parameters are used to save data
     * @param array $post
     */
    public function setPost(array $post): void;

    /**
     * Get Parameters are used to request Data
     * @param array $get
     */
    public function setGet(array $get):void;

    /**
     * Opens the controller
     */
    public function route():void;
}