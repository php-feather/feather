<?php

use Feather\Ignite\AppContainer;
use Feather\View\Native;
use Feather\View\Twig;
use Feather\View\Blade;

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

/**
 * register View engines
 */
//blade template engine
$container->register('blade', function() {
    return new Blade(VIEWS_PATH, BASE_PATH . '/storage/app/');
});

//native engine
$container->register('native', function() {
    return new Native(VIEWS_PATH, BASE_PATH . '/storage/app/');
});

//twig template engine
$container->register('twig', function() {
    return new Twig(VIEWS_PATH);
});
