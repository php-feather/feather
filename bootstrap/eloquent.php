<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$config = include '../config/eloquent-database.php';

$capsule = new Capsule;


foreach ($config['connections'] as $name => $conn) {

    if (strcasecmp($name, $config['default']) == 0) {
        $capsule->addConnection($conn);
    }

    $capsule->addConnection($conn, $name);
}

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
$capsule->bootEloquent();

