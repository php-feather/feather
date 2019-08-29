<?php

$router = \Feather\Init\Http\Router::getInstance();


$router->get('/','\Feather\Ignite\Controllers\WelcomeController');

$router->any('/test/{west}/{:test}',function($west,$test=''){
    echo 'You visitied test/'.$west."/$test";
});