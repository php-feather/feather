<?php

$router = \Feather\Init\Http\Router\Router::getInstance();

$router->get('/', '\Feather\App\Http\Controllers\WelcomeController');

$router->group(['prefix' => 'group'], function() use($router) {

    $router->get('/', '\Feather\App\Http\Controllers\WelcomeController');

    $router->group(['prefix' => 'test/{me}', 'requirements' => ['me' => '^\d+$']], function() use($router) {

        $router->get('west', '\Feather\App\Http\Controllers\WelcomeController');

        $router->group(['prefix' => 'north'], function() use($router) {

            $router->get('west/{:id}', function($id = 'default') {
                echo "You are on cest/test/north/west/$id";
            }, [], ['id' => '^aa$']);
        });
    });
});

$router->any('/test/{west}/{:test}', function($west, $test = '') {
    echo 'You visitied test/' . $west . "/$test";
});
