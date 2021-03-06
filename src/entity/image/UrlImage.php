<?php
namespace entity\image;

/**
 * This class represents an image which is just accessible via url
 * In a real application you would upload the images to the server
 * @author kevinfrantz
 *        
 */
final class UrlImage implements ImageInterface
{
    private $path;
    
    /**
     * This is just a dummy function. 
     * In a real application you would return here a smaller scaled image
     * {@inheritDoc}
     * @see \entity\image\ImageInterface::getImageThumbnail()
     */
    public function getThumbnail(): string
    {
        return str_replace('200/300', '200/200', $this->path);    
    }

    public function getImage(): string
    {
        return $this->path;
    }

    public function setImage(string $path): void
    {
        $this->path = $path;
    }
    
    public function getIcon(): string
    {
        return str_replace('200/300', '50/50', $this->path);
    }

}

