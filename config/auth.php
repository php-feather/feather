<?php

return [
    'provider'       => null,
    'authenticator'  => 'database',
    'guard'          => 'session',
    'authenticators' => [
        'database' => [
            'class'         => Feather\Auth\DbAuthenticator::class,
            'table'         => 'users',
            'identityField' => 'id',
            'connection'    => 'mysql'
        ],
    ],
    'guards'         => [
        'cookie'  => [
            'class'    => \Feather\Auth\Guard\CookieGuard::class,
            'expire'   => get_env('SESSION_LIFETIME', 120),
            'domain'   => get_env('APP_DOMAIN', null),
            'httpOnly' => true,
            'secure'   => false,
            'samesite' => 'lax'
        ],
        'session' => [
            'class'    => Feather\Auth\Guard\SessionGuard::class,
            'identity' => 'id',
        ],
        'token'   => [
            'class'     => Feather\Auth\Guard\TokenGuard::class,
            'encrypter' => new \Feather\Security\Encrypter(get_env('APP_KEY'))
        ],
    ]
];
