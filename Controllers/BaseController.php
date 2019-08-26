<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Feather\Ignite\Controllers;
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
    
}
