<?php
use router\Router;
use core\Core;

require __DIR__. '/vendor/autoload.php';
#phpinfo();
$core = new Core();
$router = new Router();
$router->setCore($core);
$router->setPost($_POST);
$router->setGet($_GET);
$router->route();
?>