<?php

namespace Feather\App\Controllers;

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
