<?php namespace Anomaly\UsersModule\Authenticator;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\UsersModule\User\Contract\User;
use Anomaly\UsersModule\User\Event\UserWasLoggedIn;
use Anomaly\UsersModule\User\Event\UserWasLoggedOut;
use Illuminate\Auth\Guard;
use Illuminate\Events\Dispatcher;

/**
 * Class Authenticator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Authenticator
 */
class Authenticator
{

    /**
     * Laravel's authentication.
     *
     * @var Guard
     */
    protected $guard;

    /**
     * The event dispatcher.
     *
     * @var Dispatcher
     */
    protected $events;

    /**
     * The extension collection.
     *
     * @var ExtensionCollection
     */
    protected $extensions;

    /**
     * Create a new Authenticator instance.
     *
     * @param Guard               $guard
     * @param Dispatcher          $events
     * @param ExtensionCollection $extensions
     */
    public function __construct(Guard $guard, Dispatcher $events, ExtensionCollection $extensions)
    {
        $this->guard      = $guard;
        $this->events     = $events;
        $this->extensions = $extensions;
    }

    /**
     * Attempt authentication.
     *
     * @param array $credentials
     */
    public function attempt(array $credentials)
    {
        $authenticators = $this->extensions->search('anomaly.module.users::authenticator.*');

        foreach ($authenticators as $authenticator) {

            $user = $authenticator->authenticate($credentials);

            if ($user instanceof User) {

                $this->events->fire(new UserWasLoggedIn($user));

                $this->guard->login($user); // Gotta do this for some reason..

                return $user;
            }
        }

        return false;
    }

    /**
     * Login a user.
     *
     * @param User $user
     */
    public function login(User $user)
    {
        $this->guard->login($user);

        $this->events->fire(new UserWasLoggedIn($user));
    }

    /**
     * Logout a user.
     *
     * @param User $user
     */
    public function logout(User $user = null)
    {
        if (!$user) {
            $user = $this->guard->user();
        }

        $this->events->fire(new UserWasLoggedOut($user));

        $this->guard->logout($user);
    }
}
