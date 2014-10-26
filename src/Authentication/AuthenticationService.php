<?php namespace Anomaly\Streams\Addon\Module\Users\Authentication;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\Authentication\Command\AuthenticateCredentialsCommand;

class AuthenticationService
{
    use CommandableTrait;

    public function authenticate($credentials)
    {
        $command = new AuthenticateCredentialsCommand($credentials);

        return $this->execute($command);
    }
}
 