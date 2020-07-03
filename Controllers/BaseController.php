<?php

namespace Feather\App\Controllers;
use Feather\Init\Controller\Controller;

/**
 * Description of BaseController
 *
 * @author fcarbah
 */
class BaseController extends Controller {
    
    protected $viewPath = VIEWS_PATH;
    protected $cache;
    public $validateAnnotations=false;
    
    public function __construct() {
        parent::__construct();
        $this->cache = (\Feather\Ignite\App::getInstance())->cache();
    }
    
    protected function renderView($template,array $data=[],$status=200,array $headers=[]){
        $data = $this->appendData($data);
        $this->response->renderView(view($template, $data),$headers,$status);
        $this->response->send();
    }
    
    protected function renderJson($data,$status=200,array $headers=[]){
        $this->response->renderJson($data,$headers,$status);
        $this->respond->send();
    }
    
}
