<?php namespace Anomaly\Streams\Addon\Module\Users\Authentication;

use Anomaly\Streams\Addon\Module\Users\Authentication\Command\AuthenticateCredentialsCommand;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class AuthenticationService
 *
 * This class is strictly for authenticating requests.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Authentication
 */
class AuthenticationService
{

    use CommandableTrait;

    /**
     * Authenticate a set of credentials.
     *
     * @param array $credentials
     * @return mixed
     */
    public function authenticate(array $credentials)
    {
        $command = new AuthenticateCredentialsCommand($credentials);

        return $this->execute($command);
    }
}
 