<?php namespace Anomaly\UsersModule\User\Command;

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
