<?php namespace Anomaly\UsersModule\User\Validation;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Login\LoginFormBuilder;

/**
 * Class ValidateCredentials
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\User\Validation
 */
class ValidateCredentials
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
