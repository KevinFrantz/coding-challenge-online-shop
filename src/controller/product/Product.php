<?php
namespace controller\product;

use controller\AbstractController;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Product extends AbstractController implements ProductInterface
{
    public function list(): void
    {}

    public function colorFilter(string $color): void
    {}

}

