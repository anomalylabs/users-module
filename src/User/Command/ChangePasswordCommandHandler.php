<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\User\Event\PasswordWasChangedEvent;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

class ChangePasswordCommandHandler
{
    use DispatchableTrait;

    protected $users;

    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function handle(ChangePasswordCommand $command)
    {
        $user = $this->users->changePassword($command->getUserId(), $command->getPassword());

        if ($user) {

            $user->raise(new PasswordWasChangedEvent($user));

            $this->dispatchEventsFor($user);

        }

        return $user ? : false;
    }
}
 