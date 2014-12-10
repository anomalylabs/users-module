<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

/**
 * Class BindingServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Provider
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
            'Anomaly\Streams\Addon\Module\Users\User\UserModel', // Also set in auth.php
            config('module.users::config.model.repository')
        );
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface',
            config('module.users::config.users.repository')
        );
    }

    protected function bindRoleInterfaces()
    {
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Role\RoleModel',
            config('module.users::config.roles.model')
        );
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Role\Contract\RoleRepositoryInterface',
            config('module.users::config.roles.repository')
        );
    }
}
 