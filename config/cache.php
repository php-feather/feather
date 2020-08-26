<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return [
    
    'expires'=>300,
    
    'driver'=>'file',

    'drivers'=> [
        
        'database'=>[

            'active'=>'mysql',
            'driver' => \Feather\Cache\DatabaseCache::class,

            'connections' => [
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
            ]
        ],

        'file'=>[
            'path'=> dirname(__FILE__,2).'/storage/cache/',
            'driver'=> Feather\Cache\FileCache::class,
        ],

        'redis'=>[
            'host'=>'localhost',
            'scheme'=>'tcp',
            'port'=>6379,
            'connOptions'=>[],
            'driver'=> \Feather\Cache\RedisCache::class
        ],
    ]
];