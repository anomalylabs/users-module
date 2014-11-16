<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

/**
 * Class ListenerServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Provider
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
            'Anomaly.Streams.Addon.Module.Users.Foundation.Event.*',
            'Anomaly\Streams\Addon\Module\Users\Foundation\AuthListener'
        );

        app('events')->listen(
            'Anomaly.Streams.Addon.Module.Users.User.Event.*',
            'Anomaly\Streams\Addon\Module\Users\User\UserListener'
        );
    }
}
 