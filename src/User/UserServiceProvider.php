<?php namespace Anomaly\UsersModule\User;

use Illuminate\Support\ServiceProvider;

/**
 * Class UserServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Anomaly\UsersModule\User\UserModel', // Also set in auth.php
            config('anomaly.module.users::config.model.repository')
        );
        $this->app->bind(
            'Anomaly\UsersModule\User\Contract\UserRepositoryInterface',
            config('anomaly.module.users::config.users.repository')
        );
    }
}
