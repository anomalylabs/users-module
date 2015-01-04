<?php namespace Anomaly\UsersModule\Provider;

/**
 * Class BindingServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Provider
 */
class BindingServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->bindUserInterfaces();
        $this->bindRoleInterfaces();
    }

    protected function bindUserInterfaces()
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

    protected function bindRoleInterfaces()
    {
        $this->app->bind(
            'Anomaly\UsersModule\Role\RoleModel',
            config('anomaly.module.users::config.roles.model')
        );
        $this->app->bind(
            'Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface',
            config('anomaly.module.users::config.roles.repository')
        );
    }
}
