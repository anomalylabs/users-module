<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Routing\Redirector;

/**
 * Class HomeController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller\Admin
 */
class HomeController extends AdminController
{

    /**
     * Redirect to the users home page.
     *
     * @param Redirector $redirect
     * @param Repository $config
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Redirector $redirect, Repository $config)
    {
        return $redirect->to($config->get('anomaly.module.users::paths.cp_home', 'admin/dashboard'));
    }
}
