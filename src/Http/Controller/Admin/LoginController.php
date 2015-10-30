<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Login\LoginFormBuilder;
use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Auth\Guard;
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
     * Return the admin login form.
     *
     * @param LoginFormBuilder $form
     * @param Redirector       $redirect
     * @param Guard            $auth
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function login(LoginFormBuilder $form, Redirector $redirect, Guard $auth)
    {
        /**
         * If we're already logged in
         * proceed to the dashboard.
         *
         * Replace this later with a
         * configurable landing page.
         */
        if ($auth->check()) {
            return $redirect->to('admin/dashboard');
        }

        return $form
            ->setOption('redirect', 'admin/dashboard')
            ->setOption('wrapper_view', 'theme::login')
            ->render();
    }

    /**
     * Log the user out.
     *
     * @param UserAuthenticator $authenticator
     * @param Guard             $auth
     * @return \Illuminate\Http\RedirectResponse|Redirector
     */
    public function logout(UserAuthenticator $authenticator, Guard $auth)
    {
        if (!$auth->guest()) {
            $authenticator->logout();
        }

        return redirect('admin/login');
    }
}
