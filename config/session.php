<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return [
    
    'lifetime'=>1200,
    
    'driver'=>'file',
    
    'filePath'=>dirname(__FILE__,2).'/storage/sessions/',
    
    'dbConfig'=>[
        
        'active'=>'mysql',
        
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
    ],
    'redis'=>[
        'host'=>'localhost',
        'scheme'=>'tcp',
        'port'=>6379,
        'connOptions'=>[]
    ]
];