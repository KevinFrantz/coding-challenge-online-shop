<?php
namespace repository\user;

use entity\user\UserInterface as UserEntityInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
interface UserInterface
{
    public function addUser(UserEntityInterface $user):void;
    
    /**
     * This function just exist for maintaining reasons
     */
    public function deleteAllUsers():void;
    
    public function getUserByMailAndHash(string $mail,string $hash):UserEntityInterface;
}

