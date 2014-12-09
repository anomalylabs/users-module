<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\Extension\AuthenticatorExtension;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class AuthenticateCredentialsCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class AuthenticateCredentialsCommandHandler
{

    /**
     * Handle the command.
     *
     * @param AuthenticateCredentialsCommand $command
     * @return bool|mixed
     */
    public function handle(AuthenticateCredentialsCommand $command)
    {
        $credentials = $command->getCredentials();

        foreach (app('streams.extensions')->search('module.users::authenticator.*') as $extension) {

            $result = $this->runAuthenticator($extension, $credentials);

            if ($result instanceof UserInterface) {

                return $result;
            }
        }

        return null;
    }

    /**
     * Run the authenticator.
     *
     * @param AuthenticatorExtension $extension
     * @param array                  $credentials
     * @return mixed
     */
    protected function runAuthenticator(AuthenticatorExtension $extension, array $credentials)
    {
        return $extension->authenticate($credentials);
    }
}
 