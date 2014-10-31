<?php namespace Anomaly\Streams\Addon\Module\Users\Authentication\Command;

use Anomaly\Streams\Addon\Module\Users\Exception\LoginRequiredException;
use Anomaly\Streams\Addon\Module\Users\Exception\PasswordRequiredException;

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
     * @throws \Anomaly\Streams\Addon\Module\Users\Exception\PasswordRequiredException
     * @throws \Anomaly\Streams\Addon\Module\Users\Exception\LoginRequiredException
     */
    protected function validateCredentials($credentials)
    {
        if (!isset($credentials['login']) or empty($credentials['login'])) {

            throw new LoginRequiredException();
        }

        if (!isset($credentials['password']) or empty($credentials['password'])) {

            throw new PasswordRequiredException();
        }
    }
}
 