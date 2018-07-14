<?php
namespace entity\user;

/**
 *
 * @author kevinfrantz
 *        
 */
final class User implements UserInterface
{
    /**
     * @var string
     */
    private $name;
    
    /**
     * Unique identifier in database (Id would be better but to much overhead for this example)
     * @var string
     */
    private $email;
    
    /**
     * @var string
     */
    private $passwordHash;
    
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(string $hash): void
    {
        $this->passwordHash = $hash;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

