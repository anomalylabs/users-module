<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class LoginController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin
 */
class LoginController extends PublicController
{

    /**
     * Show the login screen.
     *
     * @return \Illuminate\Http\RedirectResponse|Redirector|\Illuminate\View\View
     */
    public function login()
    {
        /**
         * If the user is already logged in
         * then send them to their home page.
         */
        if (app('auth')->check()) {

            return redirect(preference('module.users::home_page', 'admin/dashboard'));
        } else {

            return view('module.users::auth/login');
        }
    }

    /**
     * Attempt to login a user.
     *
     * @param Request    $request
     * @param Redirector $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function attempt(Request $request, Redirector $redirect)
    {
        $email    = $request->get('email');
        $password = $request->get('password');
        $remember = ($request->get('remember'));

        if (app('auth')->attempt(compact('email', 'password'), $remember) or app('auth')->user()) {

            return $redirect->intended(preference('module.users::home_page', 'admin/dashboard'));
        }

        return $redirect->to('auth/login');
    }
}
 