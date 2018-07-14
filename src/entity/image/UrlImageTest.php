<?php
namespace entity\image;

use PHPUnit\Framework\TestCase;

/**
 *
 * @author kevinfrantz
 *        
 */
class UrlImageTest extends TestCase
{
    const IMAGE_URL = 'http://dummy.image/200/300/test.jpg';
    
    const IMAGE_THUMB_URL = 'http://dummy.image/200/200/test.jpg';
    
    /**
     * @var UrlImage
     */
    protected $urlImage; 
    
    protected function setUp():void{
        $this->urlImage = new UrlImage();
        $this->urlImage->setImage(self::IMAGE_URL);
    }
    
    public function testImage():void{
        $this->assertEquals(self::IMAGE_URL, $this->urlImage->getImage());
    }
    
    public function testThumbnail():void{
        $this->assertEquals(self::IMAGE_THUMB_URL, $this->urlImage->getThumbnail());
    }
}

