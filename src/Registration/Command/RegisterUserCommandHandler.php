<?php namespace Anomaly\Streams\Addon\Module\Users\Registration\Command;

use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class RegisterUserCommandHandler
{

    protected $user;

    function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    public function handle(RegisterUserCommand $command)
    {
        return $this->user->createUser($command->getCredentials());
    }
}
 