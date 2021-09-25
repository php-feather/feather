<?php

use Feather\Ignite\App;
use Feather\Init\Http\Routing\Router;
use Feather\App\Http\Requests\Request;

require '../vendor/autoload.php';
require '../config/system/constants.php';

//load env
App::loadEnv(BASE_PATH, null, ['APP_KEY']);

require CONFIG_PATH . 'system/config.php';

/**
 * Application base paths
 * app base path, config path, logs path and app storage path
 */
App::setBasePaths(BASE_PATH, BASE_PATH . '/config', BASE_PATH . '/storage/logs', VIEWS_PATH, BASE_PATH . '/storage/app/');

/**
 * Get instance
 */
$app = App::getInstance();

/**
 * Boot up app
 * Add files you which to boot with the app
 */
require BASE_PATH . 'bootstrap/app.php';

$kernel = new Feather\App\Kernel($app, Router::getInstance());

/**
 * Run application
 * Process requests and return responses
 */
$kernel->handle(Request::getInstance());

/**
 * Terminate app
 */
$kernel->terminate();

