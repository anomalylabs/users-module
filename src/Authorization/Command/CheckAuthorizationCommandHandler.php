<?php namespace Anomaly\Streams\Addon\Module\Users\Authorization\Command;

use Anomaly\Streams\Addon\Module\Users\Authorization\Event\CheckAuthorizationPasses;
use Anomaly\Streams\Platform\Traits\EventableTrait;
use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\Session\SessionManager;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

class CheckAuthorizationCommandHandler
{
    use EventableTrait;
    use DispatchableTrait;

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

            if ($user = $this->repository->findByUserId($userId)) {

                $this->raise(new CheckAuthorizationPasses($userId));

                $this->dispatchEventsFor($this);

                return $user;

            }

        }

        return null;
    }
}
 