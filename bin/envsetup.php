<?php

$k = bin2hex(openssl_random_pseudo_bytes(16));
$baseDir = dirname(__FILE__, 2);
$sampleEnv = $baseDir . '/.env.sample';
$contents = file_get_contents($sampleEnv);
$newContents = str_replace('APP_KEY=', "APP_KEY=$k", $contents);
file_put_contents($baseDir . '/.env2', $newContents);


