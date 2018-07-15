<?php
namespace controller\standart;

use controller\AbstractDefaultController;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Standart extends AbstractDefaultController implements StandartInterface
{

    public function homepage(): void
    {
        $this->render('standart/homepage.html.twig');
    }
}

