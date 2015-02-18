<?php namespace Anomaly\UsersModule\User\Command;

/**
 * Class CreateUser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Command
 */
class CreateUser
{

    /**
     * The user credentials.
     *
     * @var array
     */
    protected $credentials;

    /**
     * Create a new CreateUser instance.
     *
     * @param array $credentials
     */
    function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * Get the credentials.
     *
     * @return array
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
}
