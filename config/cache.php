<?php

return [
    'expires' => 300,
    'driver'  => 'file',
    'drivers' => [
        'database' => [
            'driver'     => \Feather\Cache\DatabaseCache::class,
            'connection' => 'mysql', //db connection name from config/database.php
            'config'     => [
                'table' => 'cache'
            ]
        ],
        'file'     => [
            'path'   => 'storage/cache/',
            'driver' => Feather\Cache\FileCache::class,
        ],
        'redis'    => [
            'host'        => 'localhost',
            'scheme'      => 'tcp',
            'port'        => 6379,
            'connOptions' => [],
            'driver'      => \Feather\Cache\RedisCache::class
        ],
    ]
];
