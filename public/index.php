<?php

require '../vendor/autoload.php';
require '../config/config.php';
require '../config/constants.php';

use Feather\Ignite\App;


App::startSession($session_lifetime, $session_driver, $session_db_type, $session_path, $session_db_config);

require '../bootstrap/eloquent.php';
require '../routes/routes.php';
require '../helpers/view_helpers.php';

$app = App::getInstance();

$app->init($ctrl_namespace,$default_controller,VIEWS_PATH);

$app->setErrorPage('errors/errors.php');

$app->run();

$app->end();

