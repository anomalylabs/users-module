<?php namespace Anomaly\Streams\Addon\Module\Users\Registration\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

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
     * The user repository object.
     *
     * @var
     */
    protected $users;

    /**
     * Create a new RegisterUserCommandHandler instance.
     *
     * @param UserRepositoryInterface $users
     */
    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Handle the command.
     *
     * @param RegisterUserCommand $command
     * @return $this
     */
    public function handle(RegisterUserCommand $command)
    {
        return $this->users->registerUser($command->getCredentials());
    }
}
 