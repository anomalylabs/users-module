<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

use Illuminate\Support\ServiceProvider;

/**
 * Class AuthServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Provider
 */
class AuthServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'auth',
            function () {

                return app('Anomaly\Streams\Addon\Module\Users\Foundation\AuthService');
            }
        );
    }
}
 