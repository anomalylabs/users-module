<?php namespace Anomaly\UsersModule\User\Reset;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserReset;
use Illuminate\Routing\Redirector;

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
     * @param SettingRepositoryInterface $settings
     * @param UserRepositoryInterface    $users
     * @param ResetFormBuilder           $builder
     * @param MessageBag                 $messages
     * @param Redirector                 $redirect
     * @param UserReset                  $reset
     */
    public function handle(
        SettingRepositoryInterface $settings,
        UserRepositoryInterface $users,
        ResetFormBuilder $builder,
        MessageBag $messages,
        Redirector $redirect,
        UserReset $reset
    ) {
        $user = $users->findByEmail($builder->getEmail());

        /**
         * If we can't find the user by the email
         * provided then head back to the form.
         */
        if (!$user) {

            $messages->error(trans('anomaly.module.users::error.reset_password'));

            $builder->setFormResponse($settings->value('anomaly.module.users::password_reset_path', 'reset/complete'));

            return;
        }

        /**
         * If we can't successfully reset the
         * provided user then back back to the form.
         */
        if (!$reset->complete($user, $builder->getFormValue('code'), $builder->getFormValue('password'))) {

            $messages->error(trans('anomaly.module.users::error.reset_password'));

            $builder->setFormResponse($redirect->to('users/reset'));

            return;
        }

        $messages->success(trans('anomaly.module.users::success.reset_password'));

        $builder->setFormResponse($settings->value('anomaly.module.users::password_reset_redirect', '/'));
    }
}
