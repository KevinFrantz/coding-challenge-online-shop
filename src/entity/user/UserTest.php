<?php
namespace entity\user;

use PHPUnit\Framework\TestCase;

/**
 *
 * @author kevinfrantz
 *        
 */
class UserTest extends TestCase
{
    const NAME = 'testuser';
    
    const EMAIL = 'test@mail.world';
    
    const HASH = '1235';
    
    const ID = 5678;
    
    /**
     * @var User
     */
    protected $user;
    
    protected function setUp(){
        $this->user = new User();
        $this->user->setName(self::NAME);
        $this->user->setEmail(self::EMAIL);
        $this->user->setPasswordHash(self::HASH);
        $this->user->setId(self::ID);
    }
    
    public function testName():void{
        $this->assertEquals(self::NAME, $this->user->getName());
    }
    
    public function testEmail():void{
        $this->assertEquals(self::EMAIL, $this->user->getEmail());
    }
    
    public function testHash():void{
        $this->assertEquals(self::HASH, $this->user->getPasswordHash());
    }
    
    public function testId():void{
        $this->assertEquals(self::ID, $this->user->getId());
    }
}

