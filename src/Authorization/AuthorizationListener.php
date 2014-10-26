<?php namespace Anomaly\Streams\Addon\Module\Users\Authorization;

use Anomaly\Streams\Platform\Support\Listener;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Authorization\Event\CheckAuthorizationPasses;

class AuthorizationListener extends Listener
{
    protected $repository;

    function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function whenCheckAuthorizationPasses(CheckAuthorizationPasses $event)
    {
        $this->repository->touchLastActivity($event->getUserId());
    }
}
 