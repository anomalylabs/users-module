<?php namespace Anomaly\UsersModule\User\Reset;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserReset;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Routing\Redirector;

/**
 * Class CompleteResetFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Reset
 */
class CompleteResetFormHandler
{

    /**
     * Handle the form.
     *
     * @param UserRepositoryInterface  $users
     * @param CompleteResetFormBuilder $builder
     * @param MessageBag               $messages
     * @param Redirector               $redirect
     * @param Repository               $config
     * @param UserReset                $reset
     */
    public function handle(
        UserRepositoryInterface $users,
        CompleteResetFormBuilder $builder,
        MessageBag $messages,
        Redirector $redirect,
        Repository $config,
        UserReset $reset
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
        if (!$reset->complete($user, $builder->getCode(), $builder->getFormValue('password'))) {

            $messages->error(trans('anomaly.module.users::error.reset_password'));

            $builder->setFormResponse($redirect->to('users/reset'));

            return;
        }

        $messages->success(trans('anomaly.module.users::success.reset_password'));
    }
}
