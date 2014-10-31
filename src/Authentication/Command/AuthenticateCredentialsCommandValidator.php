<?php namespace Anomaly\Streams\Addon\Module\Users\Authentication\Command;

use Anomaly\Streams\Addon\Module\Users\Exception\LoginEmailOrUsernameRequiredException;
use Anomaly\Streams\Addon\Module\Users\Exception\LoginPasswordRequiredException;

/**
 * Class AuthenticateCredentialsCommandValidator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Authentication\Command
 */
class AuthenticateCredentialsCommandValidator
{

    /**
     * Validate the command.
     *
     * @param AuthenticateCredentialsCommand $command
     */
    public function validate(AuthenticateCredentialsCommand $command)
    {
        $this->validateCredentials($command->getCredentials());
    }

    /**
     * Validate the provided credentials.
     *
     * @param $credentials
     * @throws \Anomaly\Streams\Addon\Module\Users\Exception\LoginPasswordRequiredException
     * @throws \Anomaly\Streams\Addon\Module\Users\Exception\LoginEmailOrUsernameRequiredException
     */
    protected function validateCredentials($credentials)
    {
        if (!isset($credentials['login']) and empty($credentials['login'])) {

            throw new LoginEmailOrUsernameRequiredException();
        }

        if (!isset($credentials['password']) or empty($credentials['password'])) {

            throw new LoginPasswordRequiredException();
        }
    }
}
 