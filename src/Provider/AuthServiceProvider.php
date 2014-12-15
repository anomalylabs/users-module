<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

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
        $this->registerEvents();
        $this->registerAuthMiddleware();
    }

    /**
     * Register our events based on laravel ones.
     */
    protected function registerEvents()
    {
        /*app('events')->listen(
            'auth.login',
            function (UserInterface $user) {

                $this->dispatchEventsFor($user);
            }
        );

        app('events')->listen(
            'auth.logout',
            function (UserInterface $user = null) {

                if ($user) {

                    $this->dispatchEventsFor($user);
                }
            }
        );*/
    }

    /**
     * Register auth middleware.
     */
    protected function registerAuthMiddleware()
    {
        $this->app->bind('Authenticate', 'Anomaly\Streams\Addon\Module\Users\Http\Middleware\Authenticate');
    }
}
 