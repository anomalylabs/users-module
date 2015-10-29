<?php namespace Anomaly\UsersModule\User\Login;

use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Routing\Redirector;

/**
 * Class LoginFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Login
 */
class LoginFormHandler
{

    /**
     * Handle the form.
     *
     * @param LoginFormBuilder  $builder
     * @param Redirector        $redirect
     * @param UserAuthenticator $authenticator
     */
    public function handle(LoginFormBuilder $builder, Redirector $redirect, UserAuthenticator $authenticator)
    {
        if (!$user = $builder->getUser()) {
            return;
        }

        $authenticator->login($user, $builder->getFormValue('remember_me'));

        $builder->setFormResponse($redirect->intended($builder->getFormOption('redirect', 'admin/dashboard')));
    }
}
