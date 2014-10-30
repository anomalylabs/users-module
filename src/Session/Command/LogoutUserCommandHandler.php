<?php namespace Anomaly\Streams\Addon\Module\Users\Session\Command;

use Anomaly\Streams\Addon\Module\Users\Session\SessionManager;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Platform\Traits\EventableTrait;

class LogoutUserCommandHandler
{

    use EventableTrait;
    use DispatchableTrait;

    protected $session;

    function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function handle(LogoutUserCommand $command)
    {
        $this->session->logout();
    }
}
 