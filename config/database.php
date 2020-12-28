<?php

//add additional database connections here and the add them in bootstrap/eloquent.php
return [
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            "driver" => "mysql",
            "host" => get_env('DB_HOST', 'localhost'),
            "database" => get_env('DB_SCHEMA', 'test_db'),
            "username" => get_env('DB_USER', 'test'),
            "password" => get_env('DB_PASS', ''),
        ]
    ]
];

