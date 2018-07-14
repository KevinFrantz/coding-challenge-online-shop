<?php
namespace entity\product;

use entity\price\Price;
use entity\image\UrlImage;
use PHPUnit\Framework\TestCase;

/**
 *
 * @author kevinfrantz
 *        
 */
class ProductTest extends TestCase
{
    const COLOR = 'red';
    
    const ID = '123';
    
    const NAME = 'ITProduct';
    
    /**
     * @var Price
     */
    protected $price;
    
    /**
     * @var Product
     */
    protected $product;
    
    /**
     * 
     * @var UrlImage
     */
    protected $image;
    
    protected function setUp():void{
        $this->product = new Product();
        $this->price = new Price();
        $this->image = new UrlImage();
        $this->product->setImage($this->image);
        $this->product->setPrice($this->price);
        $this->product->setColor(self::COLOR);
        $this->product->setId(self::ID);
        $this->product->setName(self::NAME);
    }
    
    public function testImage():void{
        $this->assertInstanceOf(UrlImage::class, $this->product->getImage());
    }
    
    public function testPrice():void{
        $this->assertInstanceOf(Price::class, $this->product->getPrice());
    }
    
    public function testColor():void{
        $this->assertEquals(self::COLOR, $this->product->getColor());
    }
    
    public function testId():void{
        $this->assertEquals(self::ID, $this->product->getId());
    }
    
    public function testName():void{
        $this->assertEquals(self::NAME, $this->product->getName());
    }
}

