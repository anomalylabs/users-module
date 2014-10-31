<?php namespace Anomaly\Streams\Addon\Module\Users\Session\Command;

/**
 * Class LoginUserCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Session\Command
 */
class LoginUserCommand
{

    /**
     * The user ID.
     *
     * @var
     */
    protected $userId;

    /**
     * The remember flag.
     *
     * @var bool
     */
    protected $remember;

    /**
     * Create a new LoginUserCommand instance.
     *
     * @param $userId
     * @param $remember
     */
    function __construct($userId, $remember = false)
    {
        $this->userId   = $userId;
        $this->remember = $remember;
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
     * Get the remember flag.
     *
     * @return bool
     */
    public function getRemember()
    {
        return $this->remember;
    }
}
 