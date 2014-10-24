<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\User\Command\ChangePasswordCommand;

class UserService
{
    use CommandableTrait;

    public function changePassword(UserInterface $user, $password)
    {
        $command = new ChangePasswordCommand($user->getAuthIdentifier(), $password);

        return $this->execute($command);
    }
}
 