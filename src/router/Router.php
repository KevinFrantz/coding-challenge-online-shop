<?php
namespace router;

use core\CoreInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Router implements RouterInterface
{
    public function route()
    {
        echo "Hello World!";
    }

    public function setGet(array $get)
    {}

    public function setCore(CoreInterface $core)
    {}

    public function setPost(array $post): void
    {}

}

