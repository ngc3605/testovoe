<?php

//точка вход

require __DIR__.'/autoload.php';



$router = new App\core\Router;
$router->run();

// $obj = new App\controllers\MessageController;

// $obj->viewAll();