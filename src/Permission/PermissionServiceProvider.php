<?php namespace Anomaly\UsersModule\Permission;

use Illuminate\Support\ServiceProvider;

/**
 * Class PermissionServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission
 */
class PermissionServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\UsersModule\Permission\PermissionRouteProvider');
    }
}
