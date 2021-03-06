<?php
namespace controller;

use core\CoreInterface;
use router\Router;

/**
 *
 * @author kevinfrantz
 *        
 */
abstract class AbstractController
{

    /**
     *
     * @var CoreInterface
     */
    protected $core;

    /**
     *
     * @var array
     */
    protected $post;

    public function __construct(CoreInterface $core)
    {
        $this->core = $core;
        $this->post = $_POST;
    }

    protected function render(string $template, array $variables = []): void
    {
        echo $this->core->getTwig()->render($template, $this->addUser($variables));
    }

    private function addUser(array $variables): array
    {
        if (array_key_exists('user', $variables)) {
            throw new \Exception('Key user isn\'t allowed!');
        }
        $variables['user'] = $this->core->getUser();
        return $variables;
    }

    protected function route(?array $get = []): void
    {
        $router = new Router();
        $router->setCore($this->core);
        $router->setGet($get);
        $router->route();
    }
}
