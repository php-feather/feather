<?php

define('CSRF_ID', get_env('APP_CSRF_ID', '__token'));
define('CSRF_HEADER', get_env('APP_CSRF_HEADER', 'X-XSRF'));
/**
 * Errors Page configuration
 */
$errors_config = [
    'defaultFile' => 'errors.php',
    'path' => 'resources/views/errors/',
    'viewEngine' => 'native'
];


/**
 * Router configuration
 * Disabing autoRouting will also disable fallbackRouting
 */
$route_config = [
    'autoRouting' => true,
    'fallbackRouting' => true,
    'cache' => [
        'enabled' => false,
        //specify driver name - this is the key name
        //in drivers array in config/cache.php
        'driver' => null
    ],
    'controller' => [
        'namespace' => "\\Feather\\App\\Http\\Controllers\\",
        'default' => \Feather\App\Http\Controllers\WelcomeController::class,
        'baseDirectory' => 'app/Http/Controllers/',
    ],
    'registeredRoutes' => 'routes/routes.php',
    'folderRouting' => [
        'enabled' => false,
        'path' => 'public/',
        'defaultFile' => 'index.php'
    ]
];

/**
 * List of available validation rules
 * You can add your custom rules to the array
 * Custom Rules must extend \Feather\Security\Validation\Rules\Rule
 */
$validation_rules = [
    'afterdate' => Feather\Security\Validation\Rules\AfterDate::class,
    'alpha' => \Feather\Security\Validation\Rules\Alpha::class,
    'alphanumeric' => Feather\Security\Validation\Rules\AlphaNumeric::class,
    'arraycount' => Feather\Security\Validation\Rules\ArrayCount::class,
    'beforedate' => \Feather\Security\Validation\Rules\BeforeDate::class,
    'date' => Feather\Security\Validation\Rules\Date::class,
    'email' => Feather\Security\Validation\Rules\Email::class,
    'exactlength' => \Feather\Security\Validation\Rules\ExactLength::class,
    'isarray' => \Feather\Security\Validation\Rules\IsArray::class,
    'maxlength' => \Feather\Security\Validation\Rules\MaxLength::class,
    'minlength' => Feather\Security\Validation\Rules\MinLength::class,
    'numeric' => Feather\Security\Validation\Rules\Numeric::class,
    'regex' => Feather\Security\Validation\Rules\Regex::class,
    'required' => Feather\Security\Validation\Rules\Required::class,
    'requiredif' => \Feather\Security\Validation\Rules\RequiredIf::class,
    'same' => Feather\Security\Validation\Rules\Same::class,
    'text' => Feather\Security\Validation\Rules\Text::class,
];

