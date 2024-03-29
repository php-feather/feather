<?php

$k           = substr(md5(bin2hex(openssl_random_pseudo_bytes(16))), 0, 16);
$baseDir     = dirname(__FILE__, 2);
$sampleEnv   = $baseDir . '/.env.sample';
$contents    = @file_get_contents($sampleEnv);
$newContents = str_replace('APP_KEY=', "APP_KEY=$k", $contents);
return @file_put_contents($baseDir . '/.env', $newContents);


