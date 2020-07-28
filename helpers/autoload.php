<?php
/**
 * Array of filenames to exclude when autoloading
 * @var array
 */
$_helpers_exclude = [];

/**
 * Autoload all files in the helpers directory
 * @global array $_helpers_exclude
 * @param type $directory
 * @return type
 */
function feather_autoload_helpers($directory){
    
    /** @var array **/
    global $_helpers_exclude;
    
    if(!is_dir($directory)){
        require_once $directory;
        return;
    }
    
    $files = scandir($directory);
    
    $dirPath = strrpos($directory,'/') === strlen($directory) -1 ? $directory : $directory.'/';
    
    foreach($files as $file){
        if(strpos($file,'.') === 0){
            continue;
        }
        
        if(is_dir($file)){
            feather_autoload_helpers($file);
        }else if(!in_array($file, $_helpers_exclude)){
            require_once $dirPath.$file;
        }
    }
    
}

feather_autoload_helpers(dirname(__FILE__));