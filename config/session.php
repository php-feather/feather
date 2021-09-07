<?php

return [
    'lifetime' => 1200,
    'driver' => 'database',
    /**
     * config additional session parameters by adding them to the 'options' array
     * configure as:
     * eg. confirgue session.gc_max_lifetime by adding 'gc_max_lifetime' => 1440
     * to options array below
     */
    'options' => [],
    'drivers' => [
        'database' => [
            'driver' => Feather\Session\Drivers\DatabaseDriver::class,
            'connection' => 'mysql',
            'config' => [
                'table' => 'sessions'
            ]
        ],
        'file' => [
            'path' => 'storage/sessions/',
            'driver' => Feather\Session\Drivers\FileDriver::class,
        ],
        'redis' => [
            'driver' => Feather\Session\Drivers\RedisDriver::class,
            'host' => 'localhost',
            'scheme' => 'tcp',
            'port' => 6379,
            'connOptions' => []
        ]
    ]
];
