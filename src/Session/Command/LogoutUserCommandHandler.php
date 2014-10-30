<?php namespace Anomaly\Streams\Addon\Module\Users\Session\Command;

use Anomaly\Streams\Addon\Module\Users\Session\SessionManager;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Platform\Traits\EventableTrait;

/**
 * Class LogoutUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Session\Command
 */
class LogoutUserCommandHandler
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
     * Create a new LogoutUserCommandHandler instance.
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
     * @param LogoutUserCommand $command
     */
    public function handle(LogoutUserCommand $command)
    {
        $this->session->logout();
    }
}
 