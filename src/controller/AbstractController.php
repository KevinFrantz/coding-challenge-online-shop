<?php
namespace controller;

use core\CoreInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
abstract class AbstractController
{
    /**
     * @var CoreInterface
     */
    protected $core;
    
    /**
     * 
     * @var array
     */
    protected $post;
    
    public function __construct(CoreInterface $core){
        $this->core = $core;    
        $this->post = $_POST;
    }
    
    protected function render(string $template,array $variables=[]):void{
        echo $this->core->getTwig()->render($template,$variables);
    }
}

