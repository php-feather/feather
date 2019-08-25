<?php

$errors_page = 'errors/errors.php';

$ctrl_namespace = "\\Feather\\Ignite\\Controllers\\";

$default_controller = '\Feather\Ignite\Controllers\WelcomeController';

$session_lifetime = 1200;

$session_driver='file';

$session_path=dirname(__FILE__,2).'/storage/sessions/';

$session_db_type='mysql';

$session_db_config=array(
    'mysql'=>array(
        'dsn'=>'mysql:host=localhost;dbname=test',
        'user'=>'root',
        'password'=>''
    ),
    'mssql'=>array(
        'dsn'=>'',
        'user'=>'',
        'password'=>''
    )
);

$cache_driver='file';

$cache_path= dirname(__FILE__,2).'/storage/cache/';

$cache_db_type='mysql';

$cache_db_config=array(
    'mysql'=>array(
        'dsn'=>'mysql:host=localhost;dbname=test',
        'user'=>'root',
        'password'=>''
    ),
    'mssql'=>array(
        'dsn'=>'',
        'user'=>'',
        'password'=>''
    )
);

