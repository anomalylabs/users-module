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
     * Boot the service provider.
     */
    public function boot()
    {
        /**
         * Only load this if installed because
         * it uses configurable interfaces.
         */
        if (INSTALLED) {
            $this->app->make('twig')->addExtension($this->app->make('Anomaly\UsersModule\UsersModulePlugin'));
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\UsersModule\UsersModuleRouteProvider');

        $this->app->register('Anomaly\UsersModule\User\UserServiceProvider');
        $this->app->register('Anomaly\UsersModule\Role\RoleServiceProvider');
        $this->app->register('Anomaly\UsersModule\Permission\PermissionServiceProvider');

        $this->app->bind('App\Http\Middleware\Authenticate', 'Anomaly\UsersModule\Http\Middleware\Authenticate');
    }
}
