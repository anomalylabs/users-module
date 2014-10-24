<?php namespace Anomaly\Streams\Addon\Module\Users\Authentication;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\Authentication\Command\AuthenticateCredentialsCommand;

class AuthenticationService
{
    use CommandableTrait;

    public function authenticate($credentials, $remember = false)
    {
        $command = new AuthenticateCredentialsCommand($credentials, $remember);

        return $this->execute($command);
    }
}
 