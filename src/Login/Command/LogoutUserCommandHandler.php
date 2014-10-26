<?php namespace Anomaly\Streams\Addon\Module\Users\Login\Command;

use Anomaly\Streams\Platform\Traits\EventableTrait;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\User\UserSession;

class LogoutUserCommandHandler
{
    use EventableTrait;
    use DispatchableTrait;

    protected $session;

    function __construct(UserSession $session)
    {
        $this->session = $session;
    }

    public function handle(LogoutUserCommand $command)
    {
        $this->session->logout();
    }
}
 