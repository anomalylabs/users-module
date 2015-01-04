<?php namespace Anomaly\UsersModule\Provider;

/**
 * Class ListenerServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Provider
 */
class ListenerServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        app('events')->listen(
            'Anomaly.Streams.Addon.Module.Users.User.Event.*',
            'Anomaly\UsersModule\User\UserListener'
        );
    }
}
