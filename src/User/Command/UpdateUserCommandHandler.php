<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

class UpdateUserCommandHandler
{
    protected $users;

    function __construct(UserRepositoryInterface $user)
    {
        $this->users = $user;
    }

    public function handle(UpdateUserCommand $command)
    {
        return $this->users->updateUser($command->getUserId(), $command->getCredentials(), $command->getData());
    }
}
 