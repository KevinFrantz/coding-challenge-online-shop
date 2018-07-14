<?php
namespace entity\product;

use entity\price\PriceInterface;
use entity\image\ImageInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Product implements ProductInterface
{
    private $name;
    
    private $image;
    
    private $color;
    
    private $price;
    
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setPrice(PriceInterface $price): void
    {
        $this->price = $price;
    }

    public function getImage(): ImageInterface
    {
        return $this->image;
    }

    public function getPrice(): PriceInterface
    {
        return $this->price;
    }

    public function setImage(ImageInterface $image): void
    {
        $this->image = $image;
    }

}

