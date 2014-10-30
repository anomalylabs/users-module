<?php namespace Anomaly\Streams\Addon\Module\Users\Authorization;

use Anomaly\Streams\Addon\Module\Users\Authorization\Command\CheckAuthorizationCommand;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

class AuthorizationService
{

    use CommandableTrait;

    public function check()
    {
        $command = new CheckAuthorizationCommand();

        return $this->execute($command);
    }

    public function isGuest()
    {
        return !($this->check());
    }
}
 