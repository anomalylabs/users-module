<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

/**
 * Class LoginUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class LoginUserCommandHandler
{

    protected $users;

    protected $persistences;

    function __construct(UserRepositoryInterface $users, PersistenceRepositoryInterface $persistences)
    {
        $this->users        = $users;
        $this->persistences = $persistences;
    }

    /**
     * Handle the command.
     *
     * @param LoginUserCommand $command
     */
    public function handle(LoginUserCommand $command)
    {
        $user     = $command->getUser();
        $remember = $command->getRemember();

        $this->users->touchLogin($user);

        $this->persistences->persist($user, $remember);
    }
}
 