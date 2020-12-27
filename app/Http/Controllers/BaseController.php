<?php

namespace Feather\App\Http\Controllers;

use Feather\Init\Controller\Controller;

/**
 * Description of BaseController
 *
 * @author fcarbah
 */
class BaseController extends Controller
{

    protected $viewPath = VIEWS_PATH;
    protected $cache;
    public $validateAnnotations = false;

    public function __construct()
    {
        parent::__construct();
        $this->cache = (\Feather\Ignite\App::getInstance())->cache();
    }

}
