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
    
    public function getUserByMailAndHash(UserEntityInterface $user):UserEntityInterface;
}

