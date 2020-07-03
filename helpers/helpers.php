<?php

function view($template,array $data,$viewEngine='native'){
    
    $app = \Feather\Ignite\App::getInstance();
    $engine = $app->getViewEngine($viewEngine);
    return $engine->render($template,$data);
}