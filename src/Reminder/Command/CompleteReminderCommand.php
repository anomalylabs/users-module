<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

/**
 * Class CompleteReminderCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder\Command
 */
class CompleteReminderCommand
{

    /**
     * The user ID.
     *
     * @var
     */
    protected $userId;

    /**
     * The reminder code.
     *
     * @var
     */
    protected $code;

    /**
     * The password. // TODO: review this..
     *
     * @var
     */
    protected $password;

    /**
     * @param $userId
     * @param $code
     * @param $password
     */
    function __construct($userId, $code, $password)
    {
        $this->code     = $code;
        $this->userId   = $userId;
        $this->password = $password;
    }

    /**
     * Get the password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the reminder code.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
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
}
 