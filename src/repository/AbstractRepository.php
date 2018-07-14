<?php
namespace repository;

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
    
    public function __construct(\PDO $database){
        $this->database = $database;
    }
}

