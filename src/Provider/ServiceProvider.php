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
        $this->bindRoleInterfaces();
        $this->bindBlockInterfaces();
        $this->bindProfileInterfaces();
        $this->bindThrottleInterfaces();
        $this->bindActivationInterfaces();
        $this->bindPersistenceInterfaces();
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

    protected function bindPersistenceInterfaces()
    {
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceModel',
            config('module.users::config.persistences.model')
        );
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface',
            config('module.users::config.persistences.repository')
        );
    }

    protected function bindActivationInterfaces()
    {
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Activation\ActivationModel',
            config('module.users::config.activations.model')
        );
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface',
            config('module.users::config.activations.repository')
        );
    }

    protected function bindBlockInterfaces()
    {
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Block\BlockModel',
            config('module.users::config.blocks.model')
        );
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface',
            config('module.users::config.blocks.repository')
        );
    }

    protected function bindRoleInterfaces()
    {
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Role\RoleModel',
            config('module.users::config.roles.model')
        );
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Role\Contract\RoleRepositoryInterface',
            config('module.users::config.roles.repository')
        );
    }

    protected function bindThrottleInterfaces()
    {
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Throttle\ThrottleModel',
            config('module.users::config.throttling.model')
        );
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Throttle\Contract\ThrottleRepositoryInterface',
            config('module.users::config.throttling.repository')
        );
    }

    protected function bindProfileInterfaces()
    {
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Profile\ProfileModel',
            config('module.users::config.profiles.model')
        );
        $this->app->bind(
            'Anomaly\Streams\Addon\Module\Users\Profile\Contract\ProfileRepositoryInterface',
            config('module.users::config.profiles.repository')
        );
    }
}
 