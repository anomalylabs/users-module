<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class UpdateUserCommandHandler
{
    protected $user;

    function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    public function handle(UpdateUserCommand $command)
    {
        return $this->user->updateUser($command->getUserId(), $command->getCredentials(), $command->getData());
    }
}
 