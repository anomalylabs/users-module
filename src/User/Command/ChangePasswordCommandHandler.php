<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\User\Event\PasswordWasChangedEvent;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

/**
 * Class ChangePasswordCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class ChangePasswordCommandHandler
{

    use DispatchableTrait;

    /**
     * The users repository interface object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface
     */
    protected $users;

    /**
     * Create a new ChangePasswordCommandHandler instance.
     *
     * @param UserRepositoryInterface $users
     */
    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Handle the command.
     *
     * @param ChangePasswordCommand $command
     * @return bool
     */
    public function handle(ChangePasswordCommand $command)
    {
        $user = $this->users->changePassword($command->getUserId(), $command->getPassword());

        if ($user) {

            $user->raise(new PasswordWasChangedEvent($user));

            $this->dispatchEventsFor($user);
        }

        return $user;
    }
}
 