<?php namespace Anomaly\UsersModule\User\Register;

use Anomaly\UsersModule\User\UserModel;
use Anomaly\UsersModule\User\UserActivator;
use Anomaly\Streams\Platform\Traits\Eventable;
use Anomaly\Streams\Platform\Traits\Transmitter;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Notification\UserHasRegistered;
use Anomaly\UsersModule\User\Register\Command\HandleAutomaticRegistration;
use Anomaly\UsersModule\User\Register\Command\HandleEmailRegistration;
use Anomaly\UsersModule\User\Register\Command\HandleManualRegistration;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Config\Repository;

class RegisterFormHandler
{
    use Transmitter;
    use DispatchesJobs;

    /**
     * Handle the form.
     *
     * @param  Repository          $config
     * @param  RegisterFormBuilder $builder
     * @param  UserActivator       $activator
     * @throws \Exception
     */
    public function handle(Repository $config, RegisterFormBuilder $builder, UserActivator $activator)
    {
        if (!$builder->canSave()) {
            return;
        }

        $builder->saveForm(); // Save the new user.

        /* @var UserInterface $user */
        $user = $builder->getFormEntry();

        $activator->start($user);

        $mode = $config->get('anomaly.module.users::config.activation_mode');

        if ($mode === 'automatic') {
            $this->dispatch(new HandleAutomaticRegistration($builder));
        } elseif ($mode === 'manual') {
            $this->dispatch(new HandleManualRegistration($builder));
        } elseif ($mode === 'email') {
            $this->dispatch(new HandleEmailRegistration($builder));
        }

        $this->transmit(new UserHasRegistered($user));
    }
}
