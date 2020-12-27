<?php

return [
    'lifetime' => 1200,
    'driver' => 'file',
    'drivers' => [
        'database' => [
            'active' => 'mysql',
            'driver' => Feather\Session\Drivers\DatabaseDriver::class,
            'connections' => [
                'mysql' => array(
                    'dsn' => 'mysql:host=localhost;dbname=test',
                    'user' => 'root',
                    'password' => ''
                ),
                'mssql' => array(
                    'dsn' => '',
                    'user' => '',
                    'password' => ''
                )
            ]
        ],
        'file' => [
            'path' => dirname(__FILE__, 2) . '/storage/sessions/',
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
