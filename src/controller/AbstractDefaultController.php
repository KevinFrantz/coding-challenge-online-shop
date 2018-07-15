<?php
namespace controller;

use router\link\Link;
use router\Router;
use router\link\LinkCollection;

/**
 * This controllers render the frames/default.html.twig
 *
 * @author kevinfrantz
 *        
 */
class AbstractDefaultController extends AbstractController
{

    protected function render(string $template, array $variables = []): void
    {
        parent::render($template, $this->addMenuItems($variables));
    }

    private function addMenuItems(array $variables): array
    {
        if (array_key_exists('menu_items', $variables)) {
            $variables['menu_items'] = array_merge($this->getMenuItems(),$variables['menu_items']);
        }else{
            $variables['menu_items'] = $this->getMenuItems();
        }
        return $variables;
    }

    private function getMenuItems(): array
    {
        return array_merge([
            new Link([], 'home'),
            new Link([
                Router::CONTROLLER => 'product',
                Router::ACTION => 'list'
            ], 'product list'),
            new Link([
                Router::CONTROLLER => 'order',
                Router::ACTION => 'basket'
            ], 'basket')
        ], $this->getUserMenuItems());
    }

    private function getUserMenuItems(): array
    {
        if ($this->core->getUser()) {
            return [
                new Link([
                    Router::CONTROLLER => 'user',
                    Router::ACTION => 'logout'
                ], 'logout')
            ];
        }
        return [new LinkCollection('login',[
            new Link([
                Router::CONTROLLER => 'user',
                Router::ACTION => 'login'
            ], 'login'),
            new Link([
                Router::CONTROLLER => 'user',
                Router::ACTION => 'register'
            ], 'register')
        ])];
    }
}

