<?php

return [
    'lifetime' => 1200,
    'driver' => 'file',
    /**
     * config additional session parameters by adding them to the 'options' array
     * configure as:
     * eg. confirgue session.gc_max_lifetime by adding 'gc_max_lifetime' => 1440
     * to options array below
     */
    'options' => [],
    'drivers' => [
        'database' => [
            'active' => 'mysql',
            'driver' => Feather\Session\Drivers\DatabaseDriver::class,
            'connections' => [
                'mysql' => array(
                    'dsn' => 'mysql:host=localhost;dbname=feather',
                    'user' => 'root',
                    'password' => '',
                    'pdoOptions' => [],
                    'table' => 'sessions'
                ),
                'mssql' => array(
                    'dsn' => '',
                    'user' => '',
                    'password' => '',
                    'pdoOptions' => [],
                    'table' => 'sessions'
                )
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
