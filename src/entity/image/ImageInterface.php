<?php
namespace entity\image;

/**
 *
 * @author kevinfrantz
 *        
 */
interface ImageInterface
{
    /**
     * @param string $path
     */
    public function setImage(string $path):void;
    
    /**
     * @return string
     */
    public function getImage():string;
    
    /**
     * @return string
     */
    public function getImageThumbnail():string;
}

