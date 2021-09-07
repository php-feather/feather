<?php

use Feather\Ignite\AppContainer;
use Feather\Support\Database\Connection;

require_once CONFIG_PATH . 'system/database.php';

$container = AppContainer::getInstance();

foreach ($database_connections['connections'] as $key => $config) {
    $container->add('database.' . $key, function() use($config) {
        $db = new Connection($config);
        $db->connect();
        return $db;
    });

    if ($key == $database_connections['default']) {
        $container->add('database.', function() use($config) {
            $db = new Connection($config);
            $db->connect();
            return $db;
        });
    }
}