<?php namespace Anomaly\UsersModule\User\Validation;

use Anomaly\UsersModule\User\Password\ChangePasswordFormBuilder;
use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class ValidateCredentials
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ValidateCurrentPassword
{

    /**
     * Handle the validation.
     *
     * @param  UserAuthenticator $authenticator
     * @param  ChangePasswordFormBuilder $builder
     * @return bool
     */
    public function handle(Guard $guard, UserAuthenticator $authenticator, ChangePasswordFormBuilder $builder)
    {
        $credentials = [
            'email' => $guard->user()->email,
            'password' => $builder->getFormValues()->get('password_old'),
        ];

        if (! $response = $authenticator->authenticate($credentials)) {
            return false;
        }

        return true;
    }
}
