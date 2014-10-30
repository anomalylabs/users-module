<?php namespace Anomaly\Streams\Addon\Module\Users;

use Illuminate\Support\ServiceProvider;

/**
 * Class UsersModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users
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
        $this->app->register('Anomaly\Streams\Addon\Module\Users\Provider\RouteServiceProvider');
        $this->app->register('Anomaly\Streams\Addon\Module\Users\Provider\ListenerServiceProvider');
        $this->app->register('Anomaly\Streams\Addon\Module\Users\Provider\InterfaceServiceProvider');
    }
}
 