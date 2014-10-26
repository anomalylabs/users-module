<?php namespace Anomaly\Streams\Addon\Module\Users\Authorization\Command;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\Session\SessionManager;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

class CheckAuthorizationCommandHandler
{
    protected $session;

    protected $repository;

    function __construct(SessionManager $session, UserRepositoryInterface $repository)
    {
        $this->session    = $session;
        $this->repository = $repository;
    }


    public function handle(CheckAuthorizationCommand $command)
    {
        $userId = $this->session->check();

        if ($userId) {

            // TODO: Move this to an event.
            $this->repository->touchLastActivity($userId);

            return $this->repository->findByUserId($userId);

        }

        return null;
    }
}
 