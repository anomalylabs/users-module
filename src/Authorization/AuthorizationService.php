<?php namespace Anomaly\Streams\Addon\Module\Users\Authorization;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\Authorization\Command\CheckAuthorizationCommand;

class AuthorizationService
{
    use CommandableTrait;

    public function check()
    {
        $command = new CheckAuthorizationCommand();

        return $this->execute($command);
    }

    public function guest()
    {
        return !($this->check());
    }
}
 