<?php

//add additional database connections here and the add them in bootstrap/eloquent.php
return [
    'eloquent' => [
        'default' => 'mysql',
        'connections' => [
            'mysql' => [
                "driver" => "mysql",
                "host" => get_env('DB_HOST', 'localhost'),
                "port" => get_env('DB_PORT', 3306),
                "database" => get_env('DB_SCHEMA', 'test_db'),
                "username" => get_env('DB_USER', 'test'),
                "password" => get_env('DB_PASS', ''),
            ]
        ]
    ]
];

