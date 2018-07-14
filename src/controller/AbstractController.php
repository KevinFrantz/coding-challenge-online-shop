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
    
    public function __construct(CoreInterface $core){
        $this->core = $core;    
    }
    
    protected function render(string $template,array $variables=[]):void{
        echo $this->core->getTwig()->render($template,$variables);
    }
}

