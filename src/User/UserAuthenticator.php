<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\UsersModule\User\Authenticator\Contract\AuthenticatorExtensionInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Event\UserWasKickedOut;
use Anomaly\UsersModule\User\Event\UserWasLoggedIn;
use Anomaly\UsersModule\User\Event\UserWasLoggedOut;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\RedirectResponse;

/**
 * Class UserAuthenticator
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UserAuthenticator
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
     * The service container.
     *
     * @var Container
     */
    protected $container;

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
     * @param Container           $container
     * @param ExtensionCollection $extensions
     */
    public function __construct(Guard $guard, Dispatcher $events, Container $container, ExtensionCollection $extensions)
    {
        $this->guard      = $guard;
        $this->events     = $events;
        $this->container  = $container;
        $this->extensions = $extensions;
    }

    /**
     * Attempt to login a user.
     *
     * @param  array $credentials
     * @param  bool  $remember
     * @return bool|UserInterface
     */
    public function attempt(array $credentials, $remember = false)
    {
        if ($response = $this->authenticate($credentials)) {

            if ($response instanceof UserInterface) {
                $this->login($response, $remember);
            }

            return $response;
        }

        return false;
    }

    /**
     * Attempt to authenticate the credentials.
     *
     * @param  array $credentials
     * @return bool|UserInterface
     */
    public function authenticate(array $credentials)
    {
        $authenticators = $this->extensions->search('anomaly.module.users::authenticator.*');

        /* @var AuthenticatorExtensionInterface $authenticator */
        foreach ($authenticators as $authenticator) {

            $response = $authenticator->authenticate($credentials);

            if ($response instanceof UserInterface) {
                return $response;
            }

            if ($response instanceof RedirectResponse) {
                return $response;
            }
        }

        return false;
    }

    /**
     * Force login a user.
     *
     * @param UserInterface $user
     * @param bool          $remember
     */
    public function login(UserInterface $user, $remember = false)
    {
        $this->guard->login($user, $remember);

        $this->events->fire(new UserWasLoggedIn($user));
    }

    /**
     * Logout a user.
     *
     * @param UserInterface $user
     */
    public function logout(UserInterface $user = null)
    {
        if (!$user) {
            $user = $this->guard->user();
        }

        if (!$user) {
            return;
        }

        $this->guard->logout($user);

        $this->events->fire(new UserWasLoggedOut($user));
    }

    /**
     * Kick out a user. They've been bad.
     *
     * @param UserInterface $user
     */
    public function kickOut(UserInterface $user, $reason)
    {
        $this->guard->logout($user);

        $this->events->fire(new UserWasKickedOut($user, $reason));
    }
}
