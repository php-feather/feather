<?php

use Feather\Ignite\AppContainer;
use Feather\Ignite\App;

$app = App::getInstance();

/**
 * Register variables to Container
 */
$container = AppContainer::getInstance();

$app->container()->add('appname', 'My App');

/**
 * we can access 'appname' register in the container in a closure
 * by just passing it as an argument
 */
$app->container()->register('appname_uc', function($appname) {
    return strtoupper($appname);
});
