<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class FindUserByIdCommandHandler
{
    protected $user;

    function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    public function handle(FindUserByIdCommand $command)
    {
        return $this->user->find($command->getUserId());
    }
}
 