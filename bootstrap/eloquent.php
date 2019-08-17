<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$config = include '../config/database.php';

$capsule = new Capsule;



$capsule->addConnection($config['mysql']);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
$capsule->bootEloquent();

