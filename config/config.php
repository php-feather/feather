<?php
/**
 * Errors Page configuration
 */
$errors_config = [
    'view' => 'errors/errors.php',
    'viewEngine' => 'native'
];

/** 
 * Controller Congigurations
 */

$ctrl_config =[
    'namespace' => "\\Feather\\App\\Controllers\\",
    'default'=> '\Feather\App\Controllers\WelcomeController'
];

/**
 * Router configuration
 * Disabing autoRouting will also disable fallbackRouting
 */
$route_config = [
    'autoRouting'=>true,
    'fallbackRouting'=>true
];

