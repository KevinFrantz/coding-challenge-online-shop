<?php
namespace router;

/**
 *
 * @author kevinfrantz
 *        
 */
class Link
{
    /** 
     * ArrayCollection would be nicer but I have to save time ;)
     * @var array
     */
    private $parameters;

    /**
     * 
     * @var string
     */
    private $name;
    
    public function __construct(array $parameters=[],string $name = ''){
        $this->setParameters($parameters);
        $this->setName($name);
    }
    
    public function setParameters(array $parameters):void{
        $this->parameters = $parameters;
    }
    
    public function setName(string $name):void{
        $this->name = $name;
    }
    
    public function getName():string{
        return $this->name;
    }
    
    public function getUrl():string{
        return "index.php".$this->getParameters(); 
    }
        
    private function getParameters():string{
        $parameters = '?';
        foreach ($this->parameters as $key=>$value){
            $parameters .= $key.'='.$value.'&';
        }
        return $parameters;
    }
}

