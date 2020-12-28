<?php

define('BASE_PATH', dirname($_SERVER['DOCUMENT_ROOT'], 1));
define('APP_PATH', BASE_PATH . '/app/');
define('CONFIG_PATH', BASE_PATH . '/config/');
define('STORAGE_PATH', BASE_PATH . '/storage/');
define('VIEWS_PATH', BASE_PATH . '/resources/views/');
define('PUBLIC_PATH', $_SERVER['DOCUMENT_ROOT']);
define('AUTH_USER', 'feather_auth_user');
