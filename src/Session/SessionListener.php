<?php namespace Anomaly\Streams\Addon\Module\Users\Session;

use Anomaly\Streams\Addon\Module\Users\Session\Event\UserWasLoggedInEvent;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;
use Anomaly\Streams\Platform\Support\Listener;

/**
 * Class SessionListener
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Session
 */
class SessionListener extends Listener
{

    /**
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface
     */
    protected $users;

    /**
     * Create a new SessionListener instance.
     *
     * @param UserRepositoryInterface $users
     */
    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Fired when a user was logged in.
     *
     * @param UserWasLoggedInEvent $event
     */
    protected function whenUserWasLoggedIn(UserWasLoggedInEvent $event)
    {
        $this->users->updateLastLoggedIn($event->getUserId());
    }
}
 