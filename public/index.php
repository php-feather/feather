<?php

require '../vendor/autoload.php';
require '../config/config.php';
require '../config/constants.php';

use Feather\Ignite\App;

App::setBasePaths(ABS_PATH,ABS_PATH.'/config',ABS_PATH.'/storage/logs',VIEWS_PATH);

App::startSession();

$app = App::getInstance();

$app->init($ctrl_namespace,$default_controller);

$app->setCaching();

$app->setErrorPage('errors/errors.php');

$app->boot();

$app->run();

$app->end();

