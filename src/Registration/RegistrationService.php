<?php namespace Anomaly\Streams\Addon\Module\Users\Registration;

use Anomaly\Streams\Addon\Module\Users\Registration\Command\RegisterUserCommand;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class RegistrationService
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Registration
 */
class RegistrationService
{

    use CommandableTrait;

    /**
     * Register a new user's credentials.
     *
     * @param array $credentials
     * @param bool  $activate
     */
    public function register(array $credentials, $activate = false)
    {
        $command = new RegisterUserCommand($credentials, $activate);

        return $this->execute($command);
    }
}
 