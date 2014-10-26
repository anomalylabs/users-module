<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface',
            'Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel'
        );

        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface',
            'Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceModel'
        );

        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface',
            'Anomaly\Streams\Addon\Module\Users\Reminder\ReminderModel'
        );

        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface',
            'Anomaly\Streams\Addon\Module\Users\User\UserModel'
        );
    }

}
 