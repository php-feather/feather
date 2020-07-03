<?php

require '../vendor/autoload.php';
require '../config/config.php';
require '../config/constants.php';

use Feather\Ignite\App;
use Feather\View\Engine\NativeEngine;
use Feather\View\Engine\TwigEngine;

App::setBasePaths(BASE_PATH,BASE_PATH.'/config',BASE_PATH.'/storage/logs',VIEWS_PATH,BASE_PATH.'/storage/app/');

App::startSession();

$app = App::getInstance();

$app->init($ctrl_namespace,$default_controller,BASE_PATH.'/Controllers/');

$app->setCaching();

$app->setErrorPage('errors/errors.php');

$app->boot([BASE_PATH.'/bootstrap/eloquent.php',BASE_PATH.'/routes/routes.php',BASE_PATH.'/helpers/view_helpers.php',BASE_PATH.'/helpers/helpers.php']);

$app->registerViewEngine('native', NativeEngine::getInstance(VIEWS_PATH, BASE_PATH.'/storage/app/'));

$app->registerViewEngine('twig', TwigEngine::getInstance(VIEWS_PATH, BASE_PATH.'/storage/app/'));

$app->run();

$app->end();

