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
     * The activate flag.
     *
     * @var
     */
    protected $activate;

    /**
     * Create a new RegisterUserCommand instance.
     *
     * @param array $credentials
     * @param       $activate
     */
    function __construct(array $credentials, $activate = false)
    {
        $this->credentials = $credentials;
        $this->activate    = $activate;
    }

    /**
     * Get the activate flag.
     *
     * @return mixed
     */
    public function getActivate()
    {
        return $this->activate;
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
 