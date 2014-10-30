<?php namespace Anomaly\Streams\Addon\Module\Users\Session\Command;

use Anomaly\Streams\Addon\Module\Users\Session\Event\UserWasLoggedInEvent;
use Anomaly\Streams\Addon\Module\Users\Session\SessionManager;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Platform\Traits\EventableTrait;

class LoginUserCommandHandler
{

    use EventableTrait;
    use DispatchableTrait;

    protected $session;

    function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function handle(LoginUserCommand $command)
    {
        $userId = $command->getUserId();

        $this->session->login($userId, $command->getRemember());

        $this->raise(new UserWasLoggedInEvent($userId));

        $this->dispatchEventsFor($this);
    }
}
 