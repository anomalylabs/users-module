<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\Authenticator\Authenticator;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class LoginController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller\Admin
 */
class LoginController extends PublicController
{

    /**
     * Show the login screen.
     *
     * @param Guard $auth
     * @return \Illuminate\Http\RedirectResponse|Redirector|\Illuminate\View\View
     */
    public function login(Guard $auth)
    {
        if ($auth->check()) {
            return redirect('admin/dashboard');
        } else {
            return view('anomaly.module.users::admin/login');
        }
    }

    /**
     * Attempt to login a user.
     *
     * @param Request       $request
     * @param Authenticator $authenticator
     * @return \Illuminate\Http\RedirectResponse|Redirector
     */
    public function attempt(Request $request, Authenticator $authenticator)
    {
        $email    = $request->get('email');
        $password = $request->get('password');
        $remember = ($request->get('remember'));

        if ($authenticator->attempt(compact('email', 'password', 'remember'))) {
            return redirect()->intended('admin/dashboard');
        }

        return redirect('admin/login');
    }
}
