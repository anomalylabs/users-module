<?php namespace Anomaly\UsersModule\User\Register;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\User\UserActivator;
use Illuminate\Routing\Redirector;

/**
 * Class RegisterFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register
 */
class RegisterFormHandler
{

    /**
     * Handle the form.
     *
     * @param SettingRepositoryInterface $settings
     * @param RegisterFormBuilder        $builder
     * @param UserActivator              $activator
     * @param Redirector                 $redirect
     */
    public function handle(
        SettingRepositoryInterface $settings,
        RegisterFormBuilder $builder,
        UserActivator $activator,
        Redirector $redirect
    ) {
        if (!$builder->canSave()) {
            return;
        }

        $builder->saveForm();

        $activator->force($builder->getFormEntry());
        /*if ($settings->get('anomaly.module.users::activation_mode') == 'automatic') {
            $manager->force($builder->getFormEntry());
        }

        if ($settings->get('anomaly.module.users::activation_mode') == 'email') {
            $mailer->send($builder->getFormEntry());
        }*/

        // Otherwise it's manual.
        $builder->setFormResponse($redirect->to($builder->getFormOption('redirect', '/')));
    }
}
