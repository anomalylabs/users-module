<?php namespace Anomaly\Streams\Addon\Module\Users\Provider;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\User\Event\UserWasLoggedIn;
use Anomaly\Streams\Addon\Module\Users\User\Event\UserWasLoggedOut;
use Laracasts\Commander\Events\DispatchableTrait;

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

    use DispatchableTrait;

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
        app('events')->listen(
            'auth.login',
            function (UserInterface $user) {

                $user->raise(new UserWasLoggedIn($user));

                $this->dispatchEventsFor($user);
            }
        );

        app('events')->listen(
            'auth.logout',
            function (UserInterface $user = null) {

                if ($user) {

                    $user->raise(new UserWasLoggedOut($user));

                    $this->dispatchEventsFor($user);
                }
            }
        );
    }

    /**
     * Register auth middleware.
     */
    protected function registerAuthMiddleware()
    {
        $this->app->bind('Authenticate', 'Anomaly\Streams\Addon\Module\Users\Http\Middleware\Authenticate');
    }
}
 