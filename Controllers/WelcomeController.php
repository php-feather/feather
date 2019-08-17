<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Feather\Ignite\Controllers;

/**
 * Description of WelcomeController
 *
 * @author fcarbah
 */
class WelcomeController extends BaseController{
    
    public function index(){
        return $this->renderView('welcome.php');
    }
    
    public function print($text=''){
        echo '<h2>'.$text.'</h2>';
    }
}
