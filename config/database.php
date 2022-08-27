<?php

return [
    'default'     => 'mysql',
    'connections' => [
        'mysql' => [
            "driver"   => "mysql",
            "host"     => get_env('DB_HOST', 'localhost'),
            "port"     => get_env('DB_PORT', 3306),
            "database" => get_env('DB_DATABASE', 'test_db'),
            "username" => get_env('DB_USER', 'test'),
            "password" => get_env('DB_PASS', ''),
        ]
    ]
];
