<?php

return [
    'name'      => 'Feather',
    'providers' => [
        'auth'     => \Feather\Ignite\Providers\AuthProvider::class,
        'database' => Feather\Ignite\Providers\DatabaseProvider::class,
        'view'     => Feather\Ignite\Providers\ViewProvider::class,
    ],
];
