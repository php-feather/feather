<?php

return [
    'lifetime' => get_env('SESSION_LIFETIME', 120), //time in minutes
    'driver'   => 'file',
    /**
     * config additional session parameters by adding them to the 'options' array
     * configure as:
     * eg. confirgue session.gc_max_lifetime by adding 'gc_max_lifetime' => 1440
     * to options array below
     */
    'options'  => [
        'domain'   => get_env('APP_DOMAIN', null),
        'secure'   => false,
        'httpOnly' => true,
        'name'     => get_env('SESSION_COOKIE_NAME', 'fa_session'),
        'samesite' => 'lax',
    ],
    'drivers'  => [
        'database' => [
            'driver'     => Feather\Session\Drivers\DatabaseDriver::class,
            'connection' => 'mysql',
            'config'     => [
                'table' => 'sessions'
            ]
        ],
        'file'     => [
            'path'   => 'storage/sessions/',
            'driver' => Feather\Session\Drivers\FileDriver::class,
        ],
        'redis'    => [
            'driver'      => Feather\Session\Drivers\RedisDriver::class,
            'host'        => 'localhost',
            'scheme'      => 'tcp',
            'port'        => 6379,
            'connOptions' => []
        ]
    ]
];
