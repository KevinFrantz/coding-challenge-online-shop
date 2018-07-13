<?php
namespace controller\user;

/**
 *
 * @author kevinfrantz
 *        
 */
interface UserInterface
{
    public function login():void;
    
    public function logout():void;
    
    public function register():void;
}

