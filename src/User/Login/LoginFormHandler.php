<?php namespace Anomaly\UsersModule\User\Login;

use Anomaly\UsersModule\User\UserAuthenticator;

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
     * @param UserAuthenticator $authenticator
     */
    public function handle(LoginFormBuilder $builder, UserAuthenticator $authenticator)
    {
        if (!$user = $builder->getUser()) {
            return;
        }

        $authenticator->login($user, $builder->getFormValue('remember_me'));
    }
}
