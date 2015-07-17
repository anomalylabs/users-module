<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\Authenticator\Authenticator;
use Anomaly\UsersModule\User\Login\LoginFormBuilder;
use Illuminate\Auth\Guard;
use Illuminate\Routing\Redirector;

/**
 * Class LoginController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller
 */
class LoginController extends PublicController
{

    /**
     * Return the user login form.
     *
     * @param LoginFormBuilder $login
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(LoginFormBuilder $login)
    {
        return $login->render();
    }

    /**
     * Logout the user.
     *
     * @param Authenticator $authenticator
     * @param Redirector    $redirect
     * @param Guard         $auth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Authenticator $authenticator, Redirector $redirect, Guard $auth)
    {
        if (!$auth->guest()) {
            $authenticator->logout();
        }

        return $redirect->to('/');
    }
}
