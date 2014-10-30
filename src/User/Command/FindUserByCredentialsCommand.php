<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

/**
 * Class FindUserByCredentialsCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class FindUserByCredentialsCommand
{

    /**
     * The credentials array.
     *
     * @var array
     */
    protected $credentials;

    /**
     * Create a new FindUserByCredentialsCommand instance.
     *
     * @param array $credentials
     */
    function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * Get the credentials array.
     *
     * @return mixed
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
}
 