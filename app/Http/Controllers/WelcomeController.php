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

    public function index(TestRequest $req)
    {
        return $this->renderView('welcome.php');
    }

    public function print($text = '')
    {
        if (strlen($text) > 0) {
            echo '<h2>Printed: ' . urldecode($text) . '</h2>';
        } else {
            echo '<h3>Nothing to print</h3>';
        }
    }

}
