<?php
namespace controller\user;

use controller\AbstractDefaultController;
use core\CoreInterface;
use repository\user\User as UserRepository;
use entity\user\User as UserEntity;

/**
 *
 * @author kevinfrantz
 *        
 */
final class User extends AbstractDefaultController implements UserInterface
{
    /**
     *
     * @var UserRepository
     */
    private $repository;

    public function __construct(CoreInterface $core)
    {
        parent::__construct($core);
        $this->repository = new UserRepository($core);
    }

    public function logout(): void
    {
        $this->core->setUser(null);
        $this->route();
    }

    public function login(): void
    {
        if ($this->post) {
            $this->loginRoutine();
        } else {
            $this->render('user/login.html.twig');
        }
    }

    private function loginRoutine(): void
    {
        $requestedUser = new UserEntity();
        $requestedUser->setPasswordHashByPassword($this->post['password']);
        $requestedUser->setEmail($this->post['email']);
        $this->core->setUser($this->repository->getUserByMailAndHash($requestedUser));
        $this->route();
    }

    public function register(): void
    {
        if ($this->post && $this->validateRegistrationData()) {
            $this->registerRoutine();
        } else {
            $this->render('user/register.html.twig');
        }
    }

    private function registerRoutine(): void
    {
        $requestedUser = new UserEntity();
        $requestedUser->setPasswordHashByPassword($this->post['password']);
        $requestedUser->setName($this->post['name']);
        $requestedUser->setEmail($this->post['email']);
        $this->repository->addUser($requestedUser);
        $this->route();
    }

    private function validateRegistrationData():bool
    {
        if (! filter_var($this->post['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Not a valid email!');
        }
        if (strlen($this->post['name']) < 1) {
            throw new \Exception('Name to short!');
        }
        if (strlen($this->post['password']) < 8) {
            throw new \Exception('Password to short!');
        }
        return true;
    }
}

