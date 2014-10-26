<?php namespace Anomaly\Streams\Addon\Module\Users\Authorization\Command;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\Session\SessionManager;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

class CheckAuthorizationCommandHandler
{
    protected $session;

    protected $users;

    function __construct(SessionManager $session, UserRepositoryInterface $users)
    {
        $this->users   = $users;
        $this->session = $session;
    }


    public function handle(CheckAuthorizationCommand $command)
    {
        $userId = $this->session->check();

        if ($userId) {

            return $this->users->findByUserId($userId);

        }

        return null;
    }
}
 