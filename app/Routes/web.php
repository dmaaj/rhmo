<?php
namespace App\Routes;

use App\Controllers\AccountController;
use App\Routes\Router;
use App\Controllers\HomeController;
use App\Controllers\TransactionController;

/* Create a new router */
$router = new Router();

$router->addRoute('/', function(){
    (new HomeController)->index();
});

$router->addRoute('/account/reserve', function(){
    (new AccountController)->reserve();
});

$router->addRoute('/account/deactivate', function(){
    (new AccountController)->deactivate();
});

$router->addRoute('/transaction/status', function(){
    (new TransactionController)->status();
});

$router->execute();
