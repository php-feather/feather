<?php

require '../vendor/autoload.php';
require '../config/config.php';
require '../config/constants.php';

use Feather\Ignite\App;


App::startSession();

$app = App::getInstance();

$app->init($ctrl_namespace,$default_controller,VIEWS_PATH);

$app->setCaching();

$app->setErrorPage('errors/errors.php');

$app->boot();

$app->run();

$app->end();

