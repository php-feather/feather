<?php

$router = \Feather\Init\Http\Router\Router::getInstance();

$router->get('/', '\Feather\App\Http\Controllers\WelcomeController');

$router->any('/test/{west}/{:test}', function($west, $test = '') {
    echo 'You visitied test/' . $west . "/$test";
});
