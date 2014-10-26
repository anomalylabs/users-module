<?php namespace Anomaly\Streams\Addon\Module\Users\Session;

use Anomaly\Streams\Platform\Support\Listener;
use Anomaly\Streams\Addon\Module\Users\Session\Event\UserWasLoggedInEvent;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

class SessionListener extends Listener
{
    protected $repository;

    function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function whenUserWasLoggedIn(UserWasLoggedInEvent $event)
    {
        $this->repository->touchLastLogin($event->getUserId());
    }
}
 