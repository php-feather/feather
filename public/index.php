<?php

require '../vendor/autoload.php';
require '../config/config.php';
require '../config/constants.php';


Feather\Init\App::startSession();

require '../bootstrap/eloquent.php';
require '../routes/routes.php';
require '../helpers/view_helpers.php';

$router = \Feather\Init\Http\Router::getInstance();
$router->setDefaultController('Feather\Ignite\Controllers\WelcomeController');

$app = Feather\Init\App::getInstance();

$app->setErrorPage('errors/errors.php');

$app->run();

$app->end();

