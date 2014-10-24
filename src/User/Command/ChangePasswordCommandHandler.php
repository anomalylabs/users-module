<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\User\UserModel;
use Anomaly\Streams\Addon\Module\Users\User\Event\PasswordWasChangedEvent;

class ChangePasswordCommandHandler
{
    use DispatchableTrait;

    protected $user;

    function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    public function handle(ChangePasswordCommand $command)
    {
        $user = $this->user->changePassword($command->getUserId(), $command->getPassword());

        if ($user) {

            $user->raise(new PasswordWasChangedEvent($user));

            $this->dispatchEventsFor($user);

        }

        return $user ? : false;
    }
}
 