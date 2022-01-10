<?php

use Feather\Ignite\App;
use Feather\Ignite\Environment;
use Feather\Auth\Auth;

$app = App::getInstance();

feather_autoload(__DIR__, ['app.php']);

//register items to container
feather_autoload(BASE_PATH . 'container');

//set env and debug settings
$debug = get_env('APP_DEBUG', true);
if (in_array($debug, ['false', '0'])) {
    $debug = false;
} else {
    $debug = true;
}
$env = Environment::getInstance(get_env('APP_ENV'), (bool) $debug);

/**
 * Register Error Handler
 * You can register your custom Handler
 * Your custom Error Handler must implement \Feather\Ignite\ErrorHandler\IErrorHandler
 */
$app->registerErrorHandler($env->getErrorHandler());

/**
 * Set Page to display error messages and specify the register view engine to use for rendering error page
 * Errors page gets the following data:
 * 1. $message - error message
 * 2. $code - error code
 * 3. $file - filename in which the error occurred
 * 4. $line - line number
 */
$app->setErrorPage($errors_config['path'], $errors_config['defaultFile'], $errors_config['viewEngine']);

/**
 * Boot application
 */
$app->boot();

/**
 * Start Session
 */
$app->startSession();

/**
 * Activate caching
 */
$app->setCaching();

/**
 * Configure Routing
 */
$app->initRouter($route_config);

/**
 * Enable authentication
 */
Auth::boot($app->container('auth'));
