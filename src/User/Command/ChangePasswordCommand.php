<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

/**
 * Class ChangePasswordCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class ChangePasswordCommand
{

    /**
     * The user ID.
     *
     * @var
     */
    protected $userId;

    /**
     * The new password.
     *
     * @var
     */
    protected $password;

    /**
     * Create a new ChangePasswordCommand instance.
     *
     * @param $userId
     * @param $password
     */
    function __construct($userId, $password)
    {
        $this->userId   = $userId;
        $this->password = $password;
    }

    /**
     * Get the user ID.
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Get the new password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
}
 