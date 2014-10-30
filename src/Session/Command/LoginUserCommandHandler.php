<?php namespace Anomaly\Streams\Addon\Module\Users\Session\Command;

use Anomaly\Streams\Addon\Module\Users\Session\Event\UserWasLoggedInEvent;
use Anomaly\Streams\Addon\Module\Users\Session\SessionManager;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Platform\Traits\EventableTrait;

/**
 * Class LoginUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Session\Command
 */
class LoginUserCommandHandler
{

    use EventableTrait;
    use DispatchableTrait;

    /**
     * The session manager object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Session\SessionManager
     */
    protected $session;

    /**
     * Create a new LoginUserCommandHandler instance.
     *
     * @param SessionManager $session
     */
    function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the command.
     *
     * @param LoginUserCommand $command
     */
    public function handle(LoginUserCommand $command)
    {
        $userId = $command->getUserId();

        $this->session->login($userId, $command->getRemember());

        $this->raise(new UserWasLoggedInEvent($userId));

        $this->dispatchEventsFor($this);
    }
}
 