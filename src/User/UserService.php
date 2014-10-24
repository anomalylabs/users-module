<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Platform\Traits\CommandableTrait;

class UserService
{
    use CommandableTrait;

    public function register($data)
    {
        $command = 'Anomaly\Streams\Addon\Module\Users\User\Command\RegisterUserCommand';

        return $this->execute($command, $data);
    }

    public function registerAndActivate($data)
    {
        $user = $this->register($data);

        // Activate
    }
}
 