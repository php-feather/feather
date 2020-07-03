<?php
global $input;
$input = Feather\Init\Http\Input::getInstance();

function format_date($dateStr,$format='m/d/Y H:i:s'){
    return date($format,strtotime($dateStr));
}

function format_date_hr($dateStr){
    $date = \Carbon\Carbon::parse($dateStr);
    return $date->diffForHumans();
}
