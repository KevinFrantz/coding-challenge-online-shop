<?php
namespace entity\product;

use entity\color\ColorInterface;
use entity\price\PriceInterface;
use entity\image\ImageInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Product implements ProductInterface
{
    public function setName(string $name): void
    {}

    public function getName(): string
    {}

    public function setColor(ColorInterface $color): void
    {}

    public function getColor(): ColorInterface
    {}

    public function setId(int $id): void
    {}

    public function getId(): int
    {}

    public function setPrice(PriceInterface $price): void
    {}

    public function getImage(): ImageInterface
    {}

    public function getPrice(): PriceInterface
    {}

    public function setImage(ImageInterface $image): void
    {}

}

