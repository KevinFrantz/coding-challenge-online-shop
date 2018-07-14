<?php
namespace router;

/**
 *
 * @author kevinfrantz
 *        
 */
class Url
{
    /** 
     * ArrayCollection would be nicer but I have to save time ;)
     * @var array
     */
    private $parameters;

    public function setParameters(array $parameters):void{
        $this->parameters = $parameters;
    }
    
    public function getUrl():string{
        return "index.php".$this->getParameters(); 
    }
        
    private function getParameters():string{
        $parameters = '?';
        foreach ($parameters as $key=>$value){
            $parameters .= $key.'='.$value.'&';
        }
    }
}

