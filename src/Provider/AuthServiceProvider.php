<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

/**
 * Class AuthServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Provider
 */
class AuthServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAuthService();
        $this->registerAuthMiddleware();
    }

    /**
     * Register the auth service.
     */
    protected function registerAuthService()
    {
        $this->app->singleton(
            'streams.auth',
            function () {

                return app('Anomaly\Streams\Addon\Module\Users\Foundation\AuthService');
            }
        );
    }

    /**
     * Register auth middleware.
     */
    protected function registerAuthMiddleware()
    {
        $this->app->bind('Authenticate', 'Anomaly\Streams\Addon\Module\Users\Http\Middleware\Authenticate');
    }
}
 