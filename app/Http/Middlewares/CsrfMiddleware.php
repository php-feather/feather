<?php

namespace Feather\App\Http\Middlewares;

use Feather\Security\Csrf\CsrfToken;
use Feather\Security\Csrf\TokenManager;

/**
 * Description of Csrf
 *
 * @author fcarbah
 */
class CsrfMiddleware extends Middleware
{

    protected $errorMessage = 'Invalid Request';

    /**
     *
     * {@inheritdoc}
     */
    public function run($next)
    {
        $this->redirectUri = $this->request->server->{'HTTP_REFERER'};

        $token = $this->getToken();
        if ($token === null) {
            return $this->redirect();
        }

        $csrfToken = new CsrfToken(CSRF_ID, $token);
        $isValidToken = TokenManager::isValidToken($csrfToken);

        if (!$isValidToken) {
            $this->redirectUri = $this->request->previousUri();
            return $this->redirect();
        }

        return $next;
    }

    /**
     *
     * @return string|null
     */
    protected function getToken()
    {
        $token = $this->request->post(CSRF_ID);
        $headerToken = $this->request->server->{CSRF_HEADER};

        if (!$token && $headerToken) {
            $token = $headerToken;
        }

        if ($token) {
            return fa_decrypt($token);
        }
        return null;
    }

}
