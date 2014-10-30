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
     * The user repository interface object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new SessionListener instance.
     *
     * @param UserRepositoryInterface $repository
     */
    function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Fired when a user was logged in.
     *
     * @param UserWasLoggedInEvent $event
     */
    protected function whenUserWasLoggedIn(UserWasLoggedInEvent $event)
    {
        $this->repository->touchLastLogin($event->getUserId());
    }
}
 