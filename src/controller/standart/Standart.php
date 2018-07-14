<?php
namespace controller\standart;

use controller\AbstractController;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Standart extends AbstractController
{
    public function homepage():void{
        $this->render('standart/homepage.html.twig');
    }
}

