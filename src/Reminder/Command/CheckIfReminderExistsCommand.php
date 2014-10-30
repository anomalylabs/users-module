<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

/**
 * Class CheckIfReminderExistsCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder\Command
 */
class CheckIfReminderExistsCommand
{

    /**
     * The user ID.
     *
     * @var
     */
    protected $userId;

    /**
     * Create a new CheckIfReminderExistsCommand instance.
     *
     * @param $userId
     */
    function __construct($userId)
    {
        $this->userId = $userId;
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
 