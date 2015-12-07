<?php namespace Anomaly\UsersModule\User\Reset;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserReset;
use Illuminate\Contracts\Config\Repository;

/**
 * Class ResetFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Reset
 */
class ResetFormHandler
{

    /**
     * Handle the form.
     *
     * @param ResetFormBuilder        $builder
     * @param UserRepositoryInterface $users
     * @param UserReset               $reset
     */
    public function handle(ResetFormBuilder $builder, UserRepositoryInterface $users, UserReset $reset)
    {
        $user = $users->findByEmail($builder->getFormValue('email'));

        $reset->start($user);
        $reset->send($user);
    }
}
