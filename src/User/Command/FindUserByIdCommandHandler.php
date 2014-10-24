<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

class FindUserByIdCommandHandler
{
    protected $users;

    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function handle(FindUserByIdCommand $command)
    {
        return $this->users->findByUserId($command->getUserId());
    }
}
 