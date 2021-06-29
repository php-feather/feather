<?php

use Feather\Init\Middleware\MiddlewareProvider;

/**
 * 
 * Register middlewares and use on your routes
 * by specifying just the index name
 *
 */
$mwProvider = new MiddlewareProvider();

$mwProvider->register([
    'csrf' => Feather\App\Http\Middlewares\CsrfMiddleware::class,
]);
