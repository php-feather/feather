<?php

namespace Feather\App\Http\Controllers;

use Feather\Init\Controller\Controller;
use Feather\Cache\ICache;

/**
 * Description of BaseController
 *
 * @author fcarbah
 */
class BaseController extends Controller
{

    /** @var string * */
    protected $viewPath = VIEWS_PATH;

    /** @var \Feather\Cache\ICache * */
    protected $cache;

    /** @var bool * */
    protected $validateAnnotations = true;

    /**
     * @var \Feather\View\IView|string Supported string values: blade, native, twig
     *
     */
    protected $viewEngine = 'native';

    public function __construct()
    {
        parent::__construct();
        $this->cache = (\Feather\Ignite\App::getInstance())->cache();
    }

}
