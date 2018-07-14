<?php
namespace entity\user;

/**
 *
 * @author kevinfrantz
 *        
 */
final class User implements UserInterface
{
    public function setName(string $name): void
    {}

    public function getName(): string
    {}

    public function setEmail(string $email): void
    {}

    public function getPasswordHash(): string
    {}

    public function setPasswordHash(string $hash): void
    {}

    public function getEmail(): string
    {}

    public function getId(): int
    {}

}

