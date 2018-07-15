<?php
namespace core;

use entity\order\Order;
use entity\user\UserInterface;
use repository\user\User as UserRepository;
use repository\user\UserInterface as UserRepositoryInterface;
use entity\user\User;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Core implements CoreInterface
{

    const DATABASE_USERNAME = 'devuser';

    const DATABASE_PASSWORD = 'devpass';

    const DATABASE_NAME = 'test_db';

    const DATABASE_PORT = '3306';

    const DATABASE_HOST = 'codingchallengeonlineshop_db_1';

    /**
     *
     * @var \Twig_Environment
     */
    private $twig;

    /**
     *
     * @var UserInterface
     */
    private $user;

    /**
     *
     * @var \PDO
     */
    private $database;

    /**
     * 
     * @var Order
     */
    private $basket;
    
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    
    public function __construct()
    {
        session_start();
        $this->initTwig();
        $this->initDatabase();
        $this->initUser();
        $this->initBasket();
    }

    /**
     * Loads basket by session
     */
    private function initBasket(): void
    {
        if(!$_SESSION['basket']){
            $_SESSION['basket'] = new Order();
        }
        $this->basket = $_SESSION['basket'];
    }
    
    /**
     * Loads user by session
     */
    private function initUser(): void
    {
        $this->userRepository = new UserRepository($this);
        if($_SESSION['user']){
            $this->user = $this->getUserBySession();
        }
    }
    
    private function getUserBySession():UserInterface{
        $user = new User();
        $user->setPasswordHash($_SESSION['user']['hash']);
        $user->setEmail($_SESSION['user']['email']);
        return $this->userRepository->getUserByMailAndHash($user);
    }

    private function initTwig(): void
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../template');
        $this->twig = new \Twig_Environment($loader);
    }

    private function initDatabase(): void
    {
        $this->database = new \PDO('mysql:host=' . self::DATABASE_HOST . ';dbname=' . self::DATABASE_NAME . ';port=' . self::DATABASE_PORT, self::DATABASE_USERNAME, self::DATABASE_PASSWORD);
    }

    public function getDatabase(): \PDO
    {
        return $this->database;
    }

    public function getTwig(): \Twig_Environment
    {
        return $this->twig;
    }

    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    private function setUserSession():void{
        if($this->user){
            $_SESSION['user'] = [
                'email'=>$this->user->getEmail(),
                'hash'=>$this->user->getPasswordHash(),
            ];
        }else{
            unset($_SESSION['user']);
        }
    }
    
    public function setUser(?UserInterface $user = null): void
    {
        $this->user = $user;
        $this->setUserSession();
    }
    
    /**
     * {@inheritDoc}
     * @see \core\CoreInterface::getBasket()
     */
    public function getBasket(): Order
    {
        return $this->basket;
    }

    /**
     * The basket is depending on the session
     * {@inheritDoc}
     * @see \core\CoreInterface::setBasket()
     */
    public function setBasket(Order $basket): void
    {
        $_SESSION['basket'] = $this->basket = $basket;
    }
}

