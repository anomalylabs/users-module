<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

class CreateUserCommandHandler
{
    protected $users;

    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function handle(CreateUserCommand $command)
    {
        return $this->users->createUser($command->getCredentials());
    }
}
 