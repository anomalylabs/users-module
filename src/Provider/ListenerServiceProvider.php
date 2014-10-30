<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

use Illuminate\Support\ServiceProvider;

/**
 * Class ListenerServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Provider
 */
class ListenerServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        app('events')->listen(
            'Anomaly.Streams.Addon.Module.Users.Authorization.*',
            'Anomaly\Streams\Addon\Module\Users\Authorization\AuthorizationListener'
        );
        app('events')->listen(
            'Anomaly.Streams.Addon.Module.Users.Session.*',
            'Anomaly\Streams\Addon\Module\Users\Session\SessionListener'
        );
    }
}
 