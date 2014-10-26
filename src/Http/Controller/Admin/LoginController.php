<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\Authorization\AuthorizationService;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Addon\Module\Users\Session\SessionService;
use Anomaly\Streams\Addon\Module\Users\Exception\UserNotFoundException;
use Anomaly\Streams\Addon\Module\Users\Authentication\AuthenticationService;

class LoginController extends AdminController
{
    public function login(AuthorizationService $authorization)
    {
        if ($authorization->check()) {

            return redirect(preference('module.users::home_page', 'admin/dashboard'));

        } else {

            return view('module.users::admin/login');

        }
    }

    public function attempt(
        Request $request,
        Redirector $redirect,
        SessionService $login,
        AuthenticationService $authentication
    ) {
        try {

            if ($user = $authentication->authenticate($request->all())) {

                $login->login($user->getResource(), ($request->get('remember') == 'on'));

                return $redirect->intended(preference('module.users::home_page', 'admin/dashboard'));

            }

        } catch (UserNotFoundException $e) {

            app('streams.messages')->add('error', 'module.users::error.user_not_found');

        }

        app('streams.messages')->flash();

        return $redirect->to('admin/login');
    }
}
 