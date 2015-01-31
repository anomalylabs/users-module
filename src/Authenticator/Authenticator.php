<?php namespace Anomaly\UsersModule\Authenticator;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class Authenticator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Authenticator
 */
class Authenticator
{

    /**
     * The extension collection.
     *
     * @var ExtensionCollection
     */
    protected $extensions;

    /**
     * Create a new Authenticator instance.
     *
     * @param ExtensionCollection $extensions
     */
    public function __construct(ExtensionCollection $extensions)
    {
        $this->extensions = $extensions;
    }

    /**
     * Attempt authentication.
     *
     * @param array $credentials
     */
    public function attempt(array $credentials)
    {
        $authenticators = $this->extensions->search('anomaly.module.users::authenticator.*');

        foreach ($authenticators as $authenticator) {
            $user = $this->attemptAuthentication($authenticator, $credentials);

            if ($user instanceof UserInterface) {

                app('auth')->login($user); // Gotta do this for some reason..

                return $user;
            }
        }

        return false;
    }

    /**
     * Attempt authenticating with an authenticator.
     *
     * @param AuthenticatorExtension $authenticator
     * @param array                  $credentials
     * @return \Anomaly\UsersModule\User\Contract\UserInterface|null
     */
    protected function attemptAuthentication(AuthenticatorExtension $authenticator, array $credentials)
    {
        return $authenticator->authenticate($credentials);
    }
}
