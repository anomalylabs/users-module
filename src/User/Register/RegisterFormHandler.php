<?php namespace Anomaly\UsersModule\User\Register;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\User\Register\Command\HandleAutomaticRegistration;
use Anomaly\UsersModule\User\Register\Command\HandleEmailRegistration;
use Anomaly\UsersModule\User\Register\Command\HandleManualRegistration;
use Anomaly\UsersModule\User\UserActivator;
use Illuminate\Foundation\Bus\DispatchesJobs;

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

    use DispatchesJobs;

    /**
     * Handle the form.
     *
     * @param SettingRepositoryInterface $settings
     * @param RegisterFormBuilder        $builder
     * @param UserActivator              $activator
     * @throws \Exception
     */
    public function handle(SettingRepositoryInterface $settings, RegisterFormBuilder $builder, UserActivator $activator)
    {
        if (!$builder->canSave()) {
            return;
        }

        $builder->saveForm(); // Save the new user.

        $activator->start($builder->getFormEntry());

        $mode = $settings->value('anomaly.module.users::activation_mode', 'manual');

        if ($mode == 'automatic') {
            $this->dispatch(new HandleAutomaticRegistration($builder));
        } elseif ($mode == 'email') {
            $this->dispatch(new HandleEmailRegistration($builder));
        } elseif ($mode == 'manual') {
            $this->dispatch(new HandleManualRegistration($builder));
        } else {
            throw new \Exception("Activation mode [{$mode}] is not supported.");
        }
    }
}
