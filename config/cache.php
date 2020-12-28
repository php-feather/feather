<?php

return [
    'expires' => 300,
    'driver' => 'file',
    'drivers' => [
        'database' => [
            'active' => 'mysql',
            'driver' => \Feather\Cache\DatabaseCache::class,
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
            'path' => dirname(__FILE__, 2) . '/storage/cache/',
            'driver' => Feather\Cache\FileCache::class,
        ],
        'redis' => [
            'host' => 'localhost',
            'scheme' => 'tcp',
            'port' => 6379,
            'connOptions' => [],
            'driver' => \Feather\Cache\RedisCache::class
        ],
    ]
];
