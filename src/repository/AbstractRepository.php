<?php
namespace repository;

use core\CoreInterface;
use entity\user\UserInterface;

/**
 * 
 * @author kevinfrantz
 *        
 */
abstract class AbstractRepository
{
    /**
     * @var \PDO
     */
    protected $database;
    
    /**
     * @var UserInterface
     */
    protected $user;
    
    public function __construct(CoreInterface $core){
        $this->database = $core->getDatabase();
        $this->user = $core->getUser();
    }
}

