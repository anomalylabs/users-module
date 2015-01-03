<?php namespace Anomaly\UsersModule;

use Illuminate\Support\ServiceProvider;

/**
 * Class UsersModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule
 */
class UsersModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\UsersModule\Provider\AuthServiceProvider');
        $this->app->register('Anomaly\UsersModule\Provider\RouteServiceProvider');
        $this->app->register('Anomaly\UsersModule\Provider\BindingServiceProvider');
        $this->app->register('Anomaly\UsersModule\Provider\ListenerServiceProvider');
    }
}
