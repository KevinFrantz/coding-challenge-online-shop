<?php
namespace controller\user;

use controller\AbstractDefaultController;
use router\Router;
use controller\AbstractController;
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
            try {
                $this->loginRoutine();
            } catch (\Exception $exception) {
                $this->render('frames/exception.html.twig',['message'=>$exception->getMessage()]);
            }
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
        $this->render('user/register.html.twig');
    }
}

