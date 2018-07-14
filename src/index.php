<?php
use router\Router;
use core\Core;

require __DIR__. '/vendor/autoload.php';
$core = new Core();
$router = new Router();
$router->setCore($core);
$router->setGet($_GET);
$router->route();
?>
