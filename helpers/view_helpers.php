<?php
global $input;
$input = Feather\Init\Http\Input::getInstance();

global $stepTemplates;

$stepTemplates = array(
    'load'=>['view'=>'steps/load.php','btnPrefix'=>'','confirmLbl'=>'Confirm Load'],
    'unload'=>['view'=>'steps/unload.php','btnPrefix'=>'','confirmLbl'=>'Confirm Unload'],
    'interpretation'=>['view'=>'steps/interpretation.php','btnPrefix'=>'','confirmLbl'=>'Confirm Interpretation'],
    //'complete_interpretation'=>['view'=>'steps/interpretation.php','btnPrefix'=>'Complete','confirmLbl'=>'Confirm Interpretation Completed'],
    'peer_review'=>['view'=>'steps/peer_review.php','btnPrefix'=>''],
    'dilution'=>['view'=>'steps/dilution.php','btnPrefix'=>''],
    'extraction'=>['view'=>'steps/extraction.php','btnPrefix'=>''],
    'reconstitution'=>['view'=>'steps/reconstitution.php','btnPrefix'=>''],
    //'complete_peer_review'=>['view'=>'steps/peer_review.php','btnPrefix'=>'Complete'],
    'resulted'=>['view'=>'steps/resulted.php','btnPrefix'=>'']
);

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
    $path = ABS_PATH. '/variables.php';
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

function build_timeline_message($log){
    
    if(!$log){
        return '';
    }
    
    $exclude = !in_array($log->status,['rejected','failed','skipped']);
    
    $html = "<p class='text-uppercase h4'>$log->status</p>"; 
    
    if($log->status == 'pending'){
        return $html;
    }

    $log->load('tray');
    $log->load('machine');
    $html .='<ul>';
    if(!$exclude){
        $log->load('rejectCategory');
        $log->load('rejectReason');
        $html .= $log->rejectCategory? '<li class="h6">Reject Category: <small class="text-secondary">'.$log->rejectCategory->description.'</small></li>' : '';
        $html .= $log->rejectReason? '<li class="h6">Reject Reason: <small class="text-secondary">'.$log->rejectReason->description.'</small></li>' : '';
    }
    $html .= $log->message? '<li class="h6">Comment: <small class="text-secondary">'.$log->message.'</small></li>' : '';
    $step = strtolower($log->workflowStep->step->name);
    
    if(in_array($step,['load','dilution','extraction','reconstitution'])){
        $stepText = 'Loaded on ';
    }
    else if($step=='unload'){
        $stepText = 'Unloaded from ';
    }
    else{
        $stepText = '';
    }
    
    if($stepText != '' && $log->machine && $exclude){
        $html .= '<li class="h6">'.$stepText.$log->machine->name.'</li>';
    }
    
    if($stepText != '' && $log->tray && $exclude){
        $html .= '<li class="h6">'.$log->tray->name.'</li>';
    }
    
    $html .= '<li class="h6">Performed By: <small class="text-secondary">'.$log->user_id.'</small></li></ul>';
    return $html;
}

function stepText($stepName){
    switch(strtolower($stepName)){
        case 'dilution':
        case 'extraction':
        case 'load':
        case 'reconstitution':
            return 'Loaded on ';
        case 'unload':
            return 'Unloaded from';
        default:
            return '';
    }
}

function format_date($dateStr,$format='m/d/Y H:i:s'){
    return date($format,strtotime($dateStr));
}

function format_date_hr($dateStr){
    $date = \Carbon\Carbon::parse($dateStr);
    return $date->diffForHumans();
}

function last_action($plateTracker){
    
    if(!$plateTracker){
        return '';
    }
    
    $css = log_status_csssuffix($plateTracker->status);

    return '<small class="text-muted"><strong>'.$plateTracker->workflowStep->step->name.
        ' </strong>- <span class="badge badge-'.$css.'">'.$plateTracker->status.'</span> '.format_date_hr($plateTracker->updated_at).'</small>';
}

function log_status_csssuffix($status){
    switch($status){
        case 'completed':
        default:
            return 'success';
        case 'pending':
            return 'primary';
        case 'rejected':
            return 'danger';
    }
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

function build_tree($accession,$trackers){
    
    $parent = (object)[
        'text'=>$accession,
        'id'=> $accession,
        'children'=>[],
        'icon'=>'far fa-folder-open',
        'state'=>(object)['opened'=>true]
    ];

    foreach($trackers as $data){
        if($data['export']){
            $parent->children[] = build_tree_node($accession, $data['export'], $data['tracker'],$data['wfConfig']);
        }
    }

    return $parent;
}

function build_tree_node($parent,$export,$tracker,$config){

    $node = [
        'id'=>$export->barcode(),
        'text'=>$export->name() .'- '.$export->barcode(),
        'parent'=>$parent,
        'icon'=>'fas fa-vial'
        
    ];
    
    $logs = $tracker? $tracker->log : new Illuminate\Support\Collection();
    
    $remSteps = new Illuminate\Support\Collection();
    
    if($logs->count() > 0 && $config){
        
        $remSteps = $config->workflow->steps->whereNotIn('id',$logs->pluck('workflowStep.id')->toArray())->reverse()->all();
        
    }else if($config){
        
        $remSteps = $config->workflow->steps->reverse();
        
    }

    $node['children'] = build_children($export->barcode(0), $logs,$remSteps);

    
    return (object)$node;
}

function build_children($parent,$logs,$remSteps){
    $children = [];
    
    foreach($remSteps as $step){
        $children[] = build_rem_child($parent, $step);
    }
    
    foreach($logs as $log){
        $children[] = build_child($parent, $log);
    }
    
    return $children;
}

function build_child($parent,$log){
    $props = get_status_props($log->status);
    return (object)[
        'id'=>$log->id,
        'parent'=>$parent,
        'text'=>$log->workflowStep->step->name .' - '. $log->workflowStep->step->description,
        'icon'=> $props['icon'],
        'li_attr'=>(object)['class'=>$props['class']]
    ];
}

function build_rem_child($parent,$step){
    return (object)[
        'id'=>$step->id.$parent,
        'parent'=>$parent,
        'text'=>$step->step->name .' - '. $step->step->description,
        'icon'=> 'far fa-square',
        'li_attr'=>(object)['class'=>'text-muted']
    ];
}

function get_status_props($status){
    switch($status){
        case 'completed':
          return ['icon'=>'far fa-check-square','class'=>'text-green'];
        case 'pending':
            return ['icon'=>'far fa-minus-square','class'=>'text-purple'];
        case 'skipped':
            return ['icon'=>'far fa-caret-square-right','class'=>'text-orange'];
        case 'rejected':
            return ['icon'=>'fas fa-times','class'=>'text-red'];
        default:
            return ['icon'=>'far fa-square','class'=>'text-muted'];
    }
}


