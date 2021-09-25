<?php

namespace Feather\App;

use Feather\Ignite\Core;

/**
 * Description of Kernel
 *
 * @author fcarbah
 */
class Kernel extends Core
{

    /**
     * Specify middleware class name or instance to apply on every request
     * @var array
     * */
    protected $globalMiddlewares = [];

    /**
     * Specify middleware class name or instance to apply on every request by HTTP method
     * @var array
     */
    protected $reqMethodMiddlewares = [
        'delete' => [],
        'get' => [],
        'post' => [
        //\Feather\App\Http\Middlewares\CsrfMiddleware::class,
        ],
        'put' => [],
    ];

    /**
     * Specify middleware abbreviations/mapping
     * @var array
     */
    protected $routeMiddlewares = [
            //'csrf' => \Feather\App\Http\Middlewares\CsrfMiddleware::class,
    ];

}
