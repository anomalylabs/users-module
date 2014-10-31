<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

/**
 * Class UpdateUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class UpdateUserCommandHandler
{

    /**
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface
     */
    protected $users;

    /**
     * Create a new UpdateUserCommandHandler instance.
     *
     * @param UserRepositoryInterface $user
     */
    function __construct(UserRepositoryInterface $user)
    {
        $this->users = $user;
    }

    /**
     * Handle the command.
     *
     * @param UpdateUserCommand $command
     * @return mixed
     */
    public function handle(UpdateUserCommand $command)
    {
        return $this->users->updateUser($command->getUserId(), $command->getCredentials(), $command->getData());
    }
}
 