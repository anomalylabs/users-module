<?php namespace Anomaly\Streams\Addon\Module\Users\Registration\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class RegisterUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Registration\Command
 */
class RegisterUserCommandHandler
{

    /**
     * A user interface.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface
     */
    protected $user;

    /**
     * Create a new RegisterUserCommandHandler instance.
     *
     * @param UserInterface $user
     */
    function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the command.
     *
     * @param RegisterUserCommand $command
     * @return $this
     */
    public function handle(RegisterUserCommand $command)
    {
        return $this->user->createUser($command->getCredentials());
    }
}
 