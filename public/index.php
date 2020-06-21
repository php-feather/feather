<?php

require '../vendor/autoload.php';
require '../config/config.php';
require '../config/constants.php';

use Feather\Ignite\App;

App::setBasePaths(BASE_PATH,BASE_PATH.'/config',BASE_PATH.'/storage/logs',VIEWS_PATH,BASE_PATH.'/storage/app/');

App::startSession();

$app = App::getInstance();

$app->init($ctrl_namespace,$default_controller);

$app->setCaching();

$app->setErrorPage('errors/errors.php');

$app->boot();

$app->run();

$app->end();

