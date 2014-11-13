<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

/**
 * Class CreateUserCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class CreateUserCommand
{

    /**
     * The credentials array.
     *
     * @var
     */
    protected $credentials;

    /**
     * Create a new CreateUserCommand instance.
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
 