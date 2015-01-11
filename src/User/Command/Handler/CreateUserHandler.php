<?php namespace Anomaly\UsersModule\User\Command\Handler;

use Anomaly\UsersModule\User\Command\CreateUser;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

class CreateUserHandler
{

    protected $users;

    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function handle(CreateUser $command)
    {
        $this->users->create($command->getUsername(), $command->getEmail(), $command->getPassword());
    }
}
