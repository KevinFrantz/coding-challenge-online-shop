<?php
namespace controller\user;

use controller\AbstractDefaultController;

/**
 *
 * @author kevinfrantz
 *        
 */
final class User extends AbstractDefaultController implements UserInterface
{
    public function logout(): void
    {}

    public function login(): void
    {
        $this->render('user/login.html.twig');
    }

    public function register(): void
    {
        $this->render('user/register.html.twig');
    }

}

