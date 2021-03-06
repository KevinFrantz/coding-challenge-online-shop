<?php
namespace router\link;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @author kevinfrantz
 *        
 */
final class LinkCollection extends ArrayCollection implements LinkCollectionInterface
{
    /**
     * @var string
     */
    private $name;
    
    public function __construct(string $name,?array $links = []){
        parent::__construct($links);
        $this->name = $name;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
}

