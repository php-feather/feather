<?php

namespace Feather\App\Http\Controllers;

use Feather\App\Http\Requests\TestRequest;

/**
 * Description of WelcomeController
 *
 * @author fcarbah
 */
class WelcomeController extends BaseController
{

    public function index(\Feather\Init\Security\FormRequest $req)
    {
        return $this->renderView('welcome.php');
    }

    public function print($text = '')
    {
        echo '<h2>' . $text . '</h2>';
    }

}
