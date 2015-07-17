<?php namespace Anomaly\UsersModule\User\Login\Validation;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class ValidateEmail
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Login\Validation
 */
class ValidateEmail
{

    /**
     * Handle the validation.
     *
     * @param UserRepositoryInterface $users
     * @param                         $value
     * @return bool
     */
    public function handle(UserRepositoryInterface $users, $value)
    {
        if (!$users->findUserByEmail($value)) {
            return false;
        }

        return true;
    }
}
