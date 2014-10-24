<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class CreateUserCommandHandler
{
    protected $user;

    function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    public function handle(CreateUserCommand $command)
    {
        return $this->user->createUser($command->getCredentials());
    }
}
 