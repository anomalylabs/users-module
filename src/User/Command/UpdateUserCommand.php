<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

/**
 * Class UpdateUserCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class UpdateUserCommand
{

    /**
     * The user ID.
     *
     * @var
     */
    protected $userId;

    /**
     * The credentials array.
     *
     * @var array
     */
    protected $credentials;

    /**
     * The user data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new UpdateUserCommand instance.
     *
     * @param       $userId
     * @param array $credentials
     * @param array $data
     */
    function __construct($userId, array $credentials = [], array $data = [])
    {
        $this->data        = $data;
        $this->userId      = $userId;
        $this->credentials = $credentials;
    }

    /**
     * Get the user Id.
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
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

    /**
     * Get the user data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
 