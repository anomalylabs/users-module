<?php namespace Anomaly\UsersModule\User\Login\Validation;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Login\LoginFormBuilder;

/**
 * Class ValidateLogin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Login\Validation
 */
class ValidateLogin
{

    /**
     * Handle the validation.
     *
     * @param UserRepositoryInterface $users
     * @param LoginFormBuilder        $builder
     * @return bool
     */
    public function handle(UserRepositoryInterface $users, LoginFormBuilder $builder)
    {
        $values = $builder->getFormValues();

        if (!$user = $users->findByCredentials($values->all())) {
            return false;
        }

        $builder->setUser($user);

        return true;
    }
}
