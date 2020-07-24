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

/**
 * 
 */
$app->init($ctrl_config['namespace'],$ctrl_config['default'],APP_PATH.'/Controllers/');

/**
 * Configure Router
 */
$app->configureRouter($route_config);

/**
 * 
 */
$app->setCaching();

$app->boot([BASE_PATH.'/bootstrap/eloquent.php',BASE_PATH.'/routes/routes.php',BASE_PATH.'/helpers/view_helpers.php']);

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
 * Enable route caching - this will use by default the caching method of the app if specified
 * To use a custom caching you can register a cache handler on the roter itself
 * eg. \Feather\Init\Http\Router::getInstance()->setCacheHandler($cache)
 * Your custom cache must implement the \Feather\Cache\Contracts\Cache interface
 */

//$app->activateRouterCache();

/**
 * Run application
 * Process requests and return responses
 */
$app->run();

/**
 * Terminate app
 */
$app->end();

