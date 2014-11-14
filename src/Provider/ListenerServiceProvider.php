<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

use Illuminate\Support\ServiceProvider;

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
            'Anomaly.Streams.Addon.Module.Users.Foundation.Event.*',
            'Anomaly\Streams\Addon\Module\Users\Foundation\AuthListener'
        );
    }
}
 