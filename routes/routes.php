<?php

$router = \Feather\Init\Http\Routing\Router::getInstance();

$router->get('/', '\Feather\App\Http\Controllers\WelcomeController');

$router->post('/', function() {
    echo 'PHP-FEATHER - Lightweight PHP Framework';
});

$router->group(['prefix' => 'group'], function() use($router) {

    $router->get('/', '\Feather\App\Http\Controllers\WelcomeController');

    $router->group(['prefix' => 'test/{me}', 'requirements' => ['me' => '^\d+$']], function() use($router) {

        $router->get('west', '\Feather\App\Http\Controllers\WelcomeController');

        $router->group(['prefix' => 'north'], function() use($router) {

            $router->get('west/{:id}', function($me, $id = 'default') {
                echo "You are on /group/test/$me/north/west/$id";
            }, [], ['id' => '^aa$']);
        });
    });
});

$router->any('/test/{west}/{:test}', function($west, $test = '') {
    echo 'You visitied test/' . $west . "/$test";
});

$router->folder('admin/', 'backend', [], ['POST', 'GET']);

$router->folder('user/{:me}', 'backend');
