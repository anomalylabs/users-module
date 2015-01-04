<?php namespace Anomaly\UsersModule\Provider;

/**
 * Class AuthServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Provider
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
        $this->registerAuthMiddleware();
    }

    /**
     * Register auth middleware.
     */
    protected function registerAuthMiddleware()
    {
        $this->app->bind('Authenticate', 'Anomaly\UsersModule\Http\Middleware\Authenticate');
    }
}
