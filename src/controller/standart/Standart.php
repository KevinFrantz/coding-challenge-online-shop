<?php
namespace controller\standart;

use controller\AbstractController;
use router\Link;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Standart extends AbstractController implements StandartInterface
{
    public function homepage():void{
        $this->render('standart/homepage.html.twig',['options'=>$this->getAllOptions()]);
    }
    
    private function getAllOptions(){
        return [
            new Link([
                'controller'=>'user',
                'action'=>'login'
            ],'login'),
            new Link([
                'controller'=>'user',
                'action'=>'logout'
            ],'logout'),
            new Link([
                'controller'=>'user',
                'action'=>'register'
            ],'register'),
            new Link([
                'controller'=>'product',
                'action'=>'list'
            ],'product list'),
            new Link([
                'controller'=>'order',
                'action'=>'basket'
            ],'basket'),
        ];
    }
}

