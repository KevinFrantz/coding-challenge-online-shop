<?php
namespace core;

use entity\order\Order;
use entity\user\UserInterface;
use repository\user\UserInterface as UserRepositoryInterface;

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
     *
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct()
    {
        $this->initSession();
        $this->initTwig();
        $this->initDatabase();
        $this->initUser();
        $this->initBasket();
    }

    private function initSession(): void
    {
        if (! headers_sent()) {
            session_start();
        }
    }

    /**
     * Loads basket by session
     */
    private function initBasket(): void
    {
        if (! $_SESSION['basket']) {
            $_SESSION['basket'] = new Order();
        }
        $this->basket = $_SESSION['basket'];
    }

    /**
     * Loads user by session
     */
    private function initUser(): void
    {
        if ($_SESSION['user']) {
            $this->user = $_SESSION['user'];
        }
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

    public function setUser(?UserInterface $user = null): void
    {
        $_SESSION['user'] = $this->user = $user;
    }

    /**
     *
     * {@inheritdoc}
     * @see \core\CoreInterface::getBasket()
     */
    public function getBasket(): Order
    {
        return $this->basket;
    }

    /**
     * The basket is depending on the session
     *
     * {@inheritdoc}
     * @see \core\CoreInterface::setBasket()
     */
    public function setBasket(Order $basket): void
    {
        $_SESSION['basket'] = $this->basket = $basket;
    }
}

