<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

/**
 * Class ServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Provider
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->bindUserInterfaces();
        $this->registerVendorServiceProviders();
    }

    protected function bindUserInterfaces()
    {
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\User\UserModel',
            config('auth.model')
        );
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface',
            config('module.users::config.users.repository')
        );
    }

    protected function registerVendorServiceProviders()
    {
        $this->app->register('Zizaco\Entrust\EntrustServiceProvider');
        $this->app->register('GrahamCampbell\Throttle\ThrottleServiceProvider');
    }
}
 