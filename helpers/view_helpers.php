<?php
global $input;
$input = Feather\Init\Http\Input::getInstance();

/**
 * Format datetime string into format specified
 * @param string $dateStr
 * @param string $format
 * @return string
 */
function format_date($dateStr,$format='m/d/Y H:i:s'){
    return date($format,strtotime($dateStr));
}

/**
 * Format date into human readable format.
 * ex . 1 hour agao or 3 months ago
 * @param string $dateStr
 * @return string
 */
function format_date_hr($dateStr){
    $date = \Carbon\Carbon::parse($dateStr);
    return $date->diffForHumans();
}
