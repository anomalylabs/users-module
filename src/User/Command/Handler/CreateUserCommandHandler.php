<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\CreateUserCommand;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

class CreateUserCommandHandler
{

    protected $users;

    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function handle(CreateUserCommand $command)
    {
        $this->users->create($command->getUsername(), $command->getEmail(), $command->getPassword());
    }
}
