<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

/**
 * Class GetUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class GetUserCommandHandler
{

    protected $users;

    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Handle the command.
     *
     * @param GetUserCommand $command
     * @return mixed
     */
    public function handle(GetUserCommand $command)
    {
        return $this->users->find($command->getUserId());
    }
}
 