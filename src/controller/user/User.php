<?php
namespace controller\user;

use controller\AbstractDefaultController;
use router\Router;

/**
 *
 * @author kevinfrantz
 *        
 */
final class User extends AbstractDefaultController implements UserInterface
{
    public function logout(): void
    {
        $this->core->setUser(null);
        $router = new Router();
        $router->setCore($this->core);
        $router->setGet([]);
        $router->route();
    }

    public function login(): void
    {
        $this->render('user/login.html.twig');
    }

    public function register(): void
    {
        $this->render('user/register.html.twig');
    }

}

