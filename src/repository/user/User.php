<?php
namespace repository\user;

use repository\AbstractRepository;
use entity\user\UserInterface as UserEntityInterface;

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

    public function getUserByMailAndHash(string $mail, string $hash): UserEntityInterface
    {}
}

