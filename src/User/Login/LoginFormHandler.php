<?php namespace Anomaly\UsersModule\User\Login;

use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Routing\Redirector;

/**
 * Class LoginFormHandler
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\User\Login
 */
class LoginFormHandler
{

    /**
     * Handle the form.
     *
     * @param LoginFormBuilder  $builder
     * @param UserAuthenticator $authenticator
     * @param Redirector        $redirect
     */
    public function handle(LoginFormBuilder $builder, UserAuthenticator $authenticator, Redirector $redirect)
    {
        if (!$user = $builder->getUser()) {
            return;
        }

        $authenticator->login($user, $builder->getFormValue('remember_me'));

        $builder->setFormResponse($redirect->intended($builder->getFormOption('redirect', '/')));
    }
}
