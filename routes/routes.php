<?php

$router = \Feather\Init\Http\Router::getInstance();


$router->get('/','\Feather\Ignite\Controllers\WelcomeController');