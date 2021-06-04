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
                    'dsn' => 'mysql:host=localhost;dbname=feather',
                    'user' => 'root',
                    'password' => '',
                    'pdoOptions' => [],
                    'table' => 'cache'
                ),
                'mssql' => array(
                    'dsn' => '',
                    'user' => '',
                    'password' => '',
                    'pdoOptions' => [],
                    'table' => 'cache'
                )
            ]
        ],
        'file' => [
            'path' => 'storage/cache/',
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
