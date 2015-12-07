<?php namespace Anomaly\UsersModule\User\Password;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserPassword;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Routing\Redirector;

/**
 * Class ResetPasswordFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Password
 */
class ResetPasswordFormHandler
{

    /**
     * Handle the form.
     *
     * @param UserRepositoryInterface  $users
     * @param ResetPasswordFormBuilder $builder
     * @param MessageBag               $messages
     * @param Redirector               $redirect
     * @param Repository               $config
     * @param UserPassword             $password
     */
    public function handle(
        UserRepositoryInterface $users,
        ResetPasswordFormBuilder $builder,
        MessageBag $messages,
        Redirector $redirect,
        Repository $config,
        UserPassword $password
    ) {
        $user = $users->findByEmail($builder->getEmail());

        /**
         * If we can't find the user by the email
         * provided then head back to the form.
         */
        if (!$user) {

            $messages->error(trans('anomaly.module.users::error.reset_password'));

            $builder->setFormResponse($config->get('anomaly.module.users::paths.complete'));

            return;
        }

        /**
         * If we can't successfully reset the
         * provided user then back back to the form.
         */
        if (!$password->reset($user, $builder->getCode(), $builder->getFormValue('password'))) {

            $messages->error(trans('anomaly.module.users::error.reset_password'));

            $builder->setFormResponse($redirect->to('users/reset'));

            return;
        }

        $messages->success(trans('anomaly.module.users::success.reset_password'));
    }
}
