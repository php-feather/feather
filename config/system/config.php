<?php
/**
 * Errors Page configuration
 */
$errors_config = [
    'view' => 'errors/errors.php',
    'viewEngine' => 'native'
];


/**
 * Router configuration
 * Disabing autoRouting will also disable fallbackRouting
 */
$route_config = [
    'autoRouting'=>true,
    'fallbackRouting'=>true,
    'cache'=> [
        'enabled'=>false,
        //specify driver name - this is nmae 
        'driver'=> null
    ],
    'controller'=>[
        'namespace' => "\\Feather\\App\\Controllers\\",
        'default'=> '\Feather\App\Controllers\WelcomeController',
        'baseDirectory' => dirname(__FILE__,2).'/app/Controllers/',
    ]
];

