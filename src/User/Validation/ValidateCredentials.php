<?php namespace Anomaly\UsersModule\User\Validation;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Login\LoginFormBuilder;
use Anomaly\UsersModule\User\UserAuthenticator;

/**
 * Class ValidateCredentials
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ValidateCredentials
{

    /**
     * Handle the validation.
     *
     * @param  UserAuthenticator $authenticator
     * @param  LoginFormBuilder  $builder
     * @return bool
     */
    public function handle(UserAuthenticator $authenticator, LoginFormBuilder $builder)
    {
        $values = $builder->getFormValues();

        if (!$user = $authenticator->authenticate($values->all())) {
            return false;
        }

        $builder->setUser($user);

        return true;
    }
}
