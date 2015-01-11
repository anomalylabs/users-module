<?php namespace Anomaly\UsersModule\Role;

use Illuminate\Support\ServiceProvider;

/**
 * Class RoleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role
 */
class RoleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
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
