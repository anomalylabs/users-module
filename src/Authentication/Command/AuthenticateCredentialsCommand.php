<?php namespace Anomaly\Streams\Addon\Module\Users\Authentication\Command;

/**
 * Class AuthenticateCredentialsCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Authentication\Command
 */
class AuthenticateCredentialsCommand
{

    /**
     * The credentials array.
     *
     * @var array
     */
    protected $credentials = [];

    /**
     * Create a new AuthenticateCredentialsCommand instance.
     *
     * @param $credentials
     */
    function __construct(array $credentials = [])
    {
        $this->credentials = $credentials;
    }

    /**
     * Get the credentials array.
     *
     * @return array
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
}
 