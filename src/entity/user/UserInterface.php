<?php
namespace entity\user;

use entity\UniqueInterface;

/**
 * Theoreticly you could make an own entity for name
 * (Depends on the use case.)
 * In this case I just assume that the user just has an username, which is just a string
 * The same counts for email ;) -> In a real application: Entity Email ;)
 * @author kevinfrantz
 *        
 */
interface UserInterface extends UniqueInterface
{
    /**
     * @param string $hash
     */
    public function setPasswordHash(string $hash):void;
    
    public function setPasswordHashByPassword(string $password): void;
    
    /**
     * @return string
     */
    public function getPasswordHash():string;
    
    /**
     * @param string $name
     */
    public function setName(string $name):void;
    
    /**
     * @return string
     */
    public function getName():string;
    
    /**
     * @param string $email
     */
    public function setEmail(string $email):void;
    
    /**
     * @return string
     */
    public function getEmail():string;
}

