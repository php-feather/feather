<?php

use Feather\Ignite\AppContainer;

/**
 * Register variables to Container
 */
$container = AppContainer::getInstance();

$container->add('appname', 'My App');

/**
 * we can access 'appname' register in the container in a closure
 * by just passing it as an argument
 */
$container->register('appname_uc', function($appname) {
    return strtoupper($appname);
});

