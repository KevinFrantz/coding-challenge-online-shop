<?php
namespace entity\image;

/**
 *
 * @author kevinfrantz
 *        
 */
class UrlImage implements ImageInterface
{
    public function getImageThumbnail(): string
    {}

    public function getImage(): string
    {}

    public function setImage(string $path): void
    {}

}

