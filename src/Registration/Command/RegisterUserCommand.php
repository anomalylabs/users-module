<?php namespace Anomaly\Streams\Addon\Module\Users\Registration\Command;

/**
 * Class RegisterUserCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Registration\Command
 */
class RegisterUserCommand
{

    /**
     * The credentials array.
     *
     * @var
     */
    protected $credentials;

    /**
     * Create a new RegisterUserCommand instance.
     *
     * @param $credentials
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
 