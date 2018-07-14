<?php
namespace core;

use PHPUnit\Framework\TestCase;
use entity\user\User;

/**
 *
 * @author kevinfrantz
 *        
 */
class CoreTest extends TestCase
{
    /**
     * 
     * @var Core
     */
    protected $core;
    
    /**
     * 
     * @var User
     */
    protected $user;
    
    protected function setUp():void{
        $this->core = new Core();
        $this->user = new User();
        $this->core->setUser($this->user);
    }
    
    public function testTwig():void{
        $this->assertInstanceOf(\Twig_Environment::class, $this->core->getTwig());
    }
    
    public function testDatabase():void{
        $this->assertInstanceOf(\PDO::class, $this->core->getDatabase());
    }
    
    public function testUser():void{
        $this->assertEquals($this->user, $this->core->getUser());
    }
}

