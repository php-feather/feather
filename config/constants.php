<?php 
define("ABS_PATH", dirname($_SERVER['DOCUMENT_ROOT']));
define("STORAGE_PATH",ABS_PATH.'/storage');
define("VIEWS_PATH", $_SERVER['DOCUMENT_ROOT'].'/views');
define("PUBLIC_PATH", $_SERVER['DOCUMENT_ROOT']);
define('CTRL_NAMESPACE',"\\Feather\\Ignite\\Controllers\\");
define('REDIRECT_DATA_KEY' ,'redirect_data');
define('CUR_REQ_KEY','cur_req');
define('PREV_REQ_KEY','prev_req');
define('OLD_URI','old_uri');
define('SESSION_LIFETIME',$session_lifetime);