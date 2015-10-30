<?php namespace Anomaly\UsersModule\User\Reset;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserReset;

/**
 * Class ForgotPasswordFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Reset
 */
class ForgotPasswordFormHandler
{

    /**
     * Handle the form.
     *
     * @param ForgotPasswordFormBuilder $builder
     * @param UserRepositoryInterface   $users
     * @param UserReset                 $reset
     */
    public function handle(ForgotPasswordFormBuilder $builder, UserRepositoryInterface $users, UserReset $reset)
    {
        $user = $users->findByEmail($builder->getFormValue('email'));

        $reset->start($user);
    }
}
