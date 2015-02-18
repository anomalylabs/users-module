<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\Authenticator\Authenticator;
use Illuminate\Auth\Guard;

/**
 * Class LogoutController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller\Admin
 */
class LogoutController extends AdminController
{

    /**
     * Log the user out.
     *
     * @param Guard $auth
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Authenticator $authenticator)
    {
        $authenticator->logout();

        return redirect('admin/login');
    }
}
