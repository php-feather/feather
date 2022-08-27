<?php

define('CSRF_ID', get_env('APP_CSRF_ID', '__token'));
define('CSRF_HEADER', get_env('APP_CSRF_HEADER', 'X-XSRF'));
/**
 * Errors Page configuration
 */
$errors_config = [
    'defaultFile' => 'errors.php',
    'path'        => 'resources/views/errors/',
    'viewEngine'  => 'native'
];


/**
 * Router configuration
 * Disabling autoRouting will also disable fallbackRouting
 */
$route_config = [
    'autoRouting'      => true,
    'fallbackRouting'  => true,
    'cache'            => [
        'enabled' => true,
        //specify driver name - this is the key name
        //in drivers array in config/cache.php
        'driver'  => 'file'
    ],
    'controller'       => [
        'namespace'     => "\\Feather\\App\\Http\\Controllers\\",
        'default'       => \Feather\App\Http\Controllers\WelcomeController::class,
        'baseDirectory' => 'app/Http/Controllers/',
    ],
    'registeredRoutes' => 'routes/routes.php',
    'folderRouting'    => [
        'enabled'     => true,
        'path'        => 'public/',
        'defaultFile' => 'index.php'
    ]
];

