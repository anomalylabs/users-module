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
     * Fired when a user was logged in.
     *
     * @param UserWasLoggedInEvent $event
     */
    public function whenUserWasLoggedIn(UserWasLoggedInEvent $event, UserRepositoryInterface $users)
    {
        $users->updateLastLoggedIn($event->getUserId());
    }
}
 