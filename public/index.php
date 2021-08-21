<?php

use Feather\Ignite\App;

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
 * Run application
 * Process requests and return responses
 */
$app->run();

/**
 * Terminate app
 */
$app->end();

