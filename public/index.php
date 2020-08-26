<?php

require '../vendor/autoload.php';
require '../config/system/config.php';
require '../config/system/constants.php';

use Feather\Ignite\App;
use Feather\View\Engine\NativeEngine;
use Feather\View\Engine\TwigEngine;

/**
 * Application base paths
 * app base path, config path, logs path and app storage path
 */
App::setBasePaths(BASE_PATH,BASE_PATH.'/config',BASE_PATH.'/storage/logs',VIEWS_PATH,BASE_PATH.'/storage/app/');

/**
 * Get instance
 */
$app = App::getInstance();

/**
 * Boot up app
 * Add files you which to boot with the app
 */
$app->boot([BASE_PATH.'/bootstrap/eloquent.php',BASE_PATH.'/routes/routes.php']);

/**
 * Start Session
 */
$app->startSession();

/**
 * Activate caching
 */
$app->setCaching();

/**
 * Configure Router
 */
$app->configureRouter($route_config);

/**
 * Register view engines
 * You can register more if you want
 * Your custom View Engines must implement \Feather\View\ViewInterface
 */
$app->registerViewEngine('native', NativeEngine::getInstance(VIEWS_PATH, BASE_PATH.'/storage/app/'));

$app->registerViewEngine('twig', TwigEngine::getInstance(VIEWS_PATH, BASE_PATH.'/storage/app/'));

/**
 * Set Page to display error messages and specify the register view engine to use for rendering error page
 * Errors page gets the following data:
 * 1. $message - error message
 * 2. $code - error code
 * 3. $file - filename in which the error occurred 
 * 4. $line - line number
 */
$app->setErrorPage($errors_config['view'],$errors_config['viewEngine']);

/**
 * Run application
 * Process requests and return responses
 */
$app->run();

/**
 * Terminate app
 */
$app->end();

