<?php
namespace router;

use core\CoreInterface;
use controller\standart\Standart;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Router implements RouterInterface
{
    /**
     * @var CoreInterface
     */
    private $core;
    
    /**
     * 
     * @var array
     */
    private $get;
    
    /**
     * 
     * @var array
     */
    private $post;
    
    public function route():void
    {
        if($this->post['route']){
            $this->postRouting();
        }
        if($this->get['router']){
            $this->getRouting();
        }else{
            $standart = new Standart($this->core);
            $standart->homepage();
        }
    }
    
    private function postRouting():void{
        
    }
    
    private function getRouting():void{
        
    }

    public function setGet(array $get):void
    {
        $this->get = $get;
    }

    public function setCore(CoreInterface $core):void
    {
        $this->core = $core;
    }

    public function setPost(array $post): void
    {
        $this->post = $post;
    }

}

