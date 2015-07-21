<?php namespace Anomaly\UsersModule\User\Register;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\Activation\ActivationMailer;
use Anomaly\UsersModule\Activation\ActivationManager;

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
     * @param RegisterFormBuilder $builder
     */
    public function handle(
        SettingRepositoryInterface $settings,
        RegisterFormBuilder $builder,
        ActivationMailer $mailer,
        ActivationManager $manager
    ) {
        if (!$builder->canSave()) {
            return;
        }

        $builder->saveForm();

        if ($settings->get('anomaly.module.users::activation_mode') == 'automatic') {
            $manager->force($builder->getFormEntry());
        }

        if ($settings->get('anomaly.module.users::activation_mode') == 'email') {
            $mailer->send($builder->getFormEntry());
        }

        // Otherwise it's manual.
        $builder->setFormResponse(redirect('/'));
    }
}
