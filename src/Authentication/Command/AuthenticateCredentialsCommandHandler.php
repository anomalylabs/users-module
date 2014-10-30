<?php namespace Anomaly\Streams\Addon\Module\Users\Authentication\Command;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\Exception\UserNotFoundException;
use Anomaly\Streams\Addon\Module\Users\Authentication\Contract\AuthenticatorInterface;

/**
 * Class AuthenticateCredentialsCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Authentication\Command
 */
class AuthenticateCredentialsCommandHandler
{

    /**
     * Handle the command.
     *
     * @param AuthenticateCredentialsCommand $command
     * @return null
     * @throws \Anomaly\Streams\Addon\Module\Users\Exception\UserNotFoundException
     */
    public function handle(AuthenticateCredentialsCommand $command)
    {
        $credentials = $command->getCredentials();

        $user = $this->tryAuthenticators($credentials);

        if (!$user) {

            throw new UserNotFoundException;

        }

        return $user;
    }

    /**
     * Try authenticating with all our available authenticators.
     *
     * By default this is just our default authenticator but
     * one could add an authenticator for example for migrated
     * Drupal users and the system or LDAP.
     *
     * @param $credentials
     * @return UserInterface|null
     */
    protected function tryAuthenticators($credentials)
    {
        // TODO: IMPLEMENT LEVEL 2 LICENSE CHECK HERE (Pro)
        $authenticators = app('streams.extensions')->find('module.users::*.authenticator');

        foreach ($authenticators as $authenticator) {

            $user = $this->attemptAuthentication($authenticator, $credentials);

            if ($user instanceof UserInterface) {

                return $user;

            }

        }

        return null;
    }

    /**
     * Attempt authentication through an authenticator.
     *
     * @param $authenticator
     * @param $credentials
     * @return UserInterface|null
     */
    protected function attemptAuthentication($authenticator, $credentials)
    {
        if ($authenticator instanceof AuthenticatorInterface) {

            return $authenticator->authenticate($credentials);

        }

        return null;
    }

}
 