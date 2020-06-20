<?php
global $input;
$input = Feather\Init\Http\Input::getInstance();


function get_value($name,$default=''){
    global $input;

    $all = $input->all();
    if(isset($all[$name])){
        return $all[$name];
    }
    return $default;
}

function asset($path){
    $relPath = substr($path, 0,1) == '/'? substr($path, 1) : $path;
    return stripos($relPath,'assets/') === 0? $relPath : '/assets/'.$relPath;
    
}

function url($uri){
    return (substr($uri,0,1) == '/')? $uri : '/'.$uri;
}

function url_prev(){
    return Feather\Http\Session::get(PREV_REQ_KEY);
}

function set_variables($keys){
    $path = BASE_PATH. '/variables.php';
    $file = fopen($path, 'w');
    
    if($file){

        fwrite($file,'<?php'.PHP_EOL);
        
        foreach($keys as $key){
            fwrite($file,"global $$key;\n");
        }
        
        fclose($file);
    }
    
    return $path;
}

function step_template($name){
    
    global $stepTemplates;
    
    if(isset($stepTemplates[$name])){
        return $stepTemplates[$name];
    }
    
}

function format_date($dateStr,$format='m/d/Y H:i:s'){
    return date($format,strtotime($dateStr));
}

function format_date_hr($dateStr){
    $date = \Carbon\Carbon::parse($dateStr);
    return $date->diffForHumans();
}

function include_path($filename,$basePath = VIEWS_PATH){
    
    $includePath = find_file($basePath, $filename);
    
    if($includePath == null){
        return;
    }else{
        $includePath = str_replace($basePath.'/','', $includePath);
    }

    return $includePath;
    
}

function find_file($path,$fileToFind){
    
    $files = scandir($path);
    $found = null;
    
    foreach($files as $file){
        
        if($file == '.' || $file == '..'){
            continue;
        }
        
        if(is_dir($path.'/'.$file)){
            $found = find_file($path.'/'.$file,$fileToFind);
        }
        
        if(strcasecmp($file,$fileToFind) ==0){
            $found = $path.'/'.$fileToFind;
            break;
        }
        
    }
    
    return $found;
    
}
