<?php namespace Anomaly\Streams\Addon\Module\Users;

use Illuminate\Support\ServiceProvider;

class UsersModuleServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\Streams\Addon\Module\Users\Provider\RouteServiceProvider');
        $this->app->register('Anomaly\Streams\Addon\Module\Users\Provider\InterfaceServiceProvider');
    }
}
 