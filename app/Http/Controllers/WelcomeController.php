<?php

namespace Feather\App\Http\Controllers;

use Feather\App\Http\Requests\Request;

/**
 * Description of WelcomeController
 *
 * @author fcarbah
 */
class WelcomeController extends BaseController
{

    public function index(Request $req)
    {
        return $this->renderView('welcome.php');
    }

    public function print($text = '')
    {
        echo '<h2>' . $text . '</h2>';
    }

}
