<?php

namespace Feather\App\Http\Middlewares;

/**
 * Description of TestMiddleware
 *
 * @author fcarbah
 */
class TestMiddleware extends Middleware
{

    public function run($next)
    {
        if (1 == 1) {
            return $next;
        }
        $this->errorCode = 0;
        return function() {
            echo 'Failed TestMiddleware';
        };
    }

}
