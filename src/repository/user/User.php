<?php
namespace repository\user;

use repository\AbstractRepository;
use entity\user\UserInterface as UserEntityInterface;
use entity\user\User as UserEntity;

/**
 *
 * @author kevinfrantz
 *        
 */
final class User extends AbstractRepository implements UserInterface
{

    public function addUser(UserEntityInterface $user): void
    {
        $statement = $this->database->prepare('INSERT INTO `user` (`name`, `email`, `hash`) VALUES (?, ?, ?);');
        $statement->execute([
            $user->getName(),
            $user->getEmail(),
            $user->getPasswordHash()
        ]);
    }

    public function getUserByMailAndHash(UserEntityInterface $user): UserEntityInterface
    {
        $statement = $this->database->prepare('SELECT * FROM `user` WHERE `hash` = ? AND `email`=?;');
        $statement->execute([
            $user->getPasswordHash(),
            $user->getEmail(),
        ]);
        $result = $statement->fetch();
        if($result){
            return $this->fetchToUser($result);
        }
        throw new \Exception('Verification data is not valid!');
    }
    
    private function fetchToUser(array $fetch):UserEntityInterface{
        $user = new UserEntity();
        $user->setPasswordHash($fetch['hash']);
        $user->setName($fetch['name']);
        $user->setEmail($fetch['email']);
        $user->setId($fetch['id']);
        return $user;
    }
}

