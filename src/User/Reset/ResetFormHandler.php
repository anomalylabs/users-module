<?php namespace Anomaly\UsersModule\User\Reset;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
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
     * @param ResetFormBuilder           $builder
     * @param SettingRepositoryInterface $settings
     * @param UserRepositoryInterface    $users
     * @param Redirector                 $redirect
     * @param UserReset                  $reset
     */
    public function handle(
        ResetFormBuilder $builder,
        SettingRepositoryInterface $settings,
        UserRepositoryInterface $users,
        Redirector $redirect,
        UserReset $reset
    ) {
        $user = $users->findByEmail($builder->getFormValue('email'));

        $reset->start($user);
        $reset->send($user);

        $builder->setFormResponse($redirect->to($settings->value('anomaly.module.users::reset_redirect', '/')));
    }
}
