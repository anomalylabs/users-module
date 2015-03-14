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
        if (app('Anomaly\Streams\Platform\Application\Application')->isInstalled()) {
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
        /**
         * Register user services.
         */
        $this->app->bind(
            'Anomaly\UsersModule\User\UserModel', // Also set in config/auth.php
            'Anomaly\UsersModule\User\UserModel'
        );

        $this->app->bind(
            'Anomaly\UsersModule\User\Contract\UserRepositoryInterface',
            'Anomaly\UsersModule\User\UserRepository'
        );

        /**
         * Register roles services.
         */
        $this->app->bind(
            'Anomaly\UsersModule\Role\RoleModel',
            'Anomaly\UsersModule\Role\RoleModel'
        );

        $this->app->bind(
            'Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface',
            'Anomaly\UsersModule\Role\RoleRepository'
        );

        /**
         * Bind the Authenticate middleware with our own.
         */
        $this->app->bind(
            'App\Http\Middleware\Authenticate',
            'Anomaly\UsersModule\Http\Middleware\Authenticate'
        );

        $this->app->register('Anomaly\UsersModule\UsersModuleRouteProvider');
    }
}
