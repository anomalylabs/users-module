<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

/**
 * Class AuthenticateCredentialsCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class AuthenticateCredentialsCommand
{

    /**
     * The credentials to authenticate.
     *
     * @var
     */
    protected $credentials;

    /**
     * Create a new AuthenticateCredentialsCommand instance.
     *
     * @param array $credentials
     */
    function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * Get the credentials to authenticate.
     *
     * @return mixed
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
}
 