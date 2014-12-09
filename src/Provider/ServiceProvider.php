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
        $this->registerConfide();
        $this->registerEntrust();
        $this->bindUserInterfaces();
    }

    protected function registerConfide()
    {
        $this->app->alias('Confide', 'Zizaco\Confide\Facade');
        $this->app->register('Zizaco\Confide\ServiceProvider');
    }

    protected function registerEntrust()
    {
        $this->app->alias('Entrust', 'Zizaco\Entrust\EntrustFacade');
        $this->app->register('Zizaco\Entrust\EntrustServiceProvider');
    }

    protected function bindUserInterfaces()
    {
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\User\UserModel',
            config('module.users::config.users.model')
        );
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface',
            config('module.users::config.users.repository')
        );
    }
}
 