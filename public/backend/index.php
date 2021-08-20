<?php

header('Content-Type: application/json');
$me = $me ?? 100;
echo json_encode(['id' => $me]);
