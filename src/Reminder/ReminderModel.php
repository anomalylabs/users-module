<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder;

use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderInterface;
use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface;
use Anomaly\Streams\Platform\Model\Users\UsersRemindersEntryModel;

/**
 * Class ReminderModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder
 */
class ReminderModel extends UsersRemindersEntryModel implements ReminderRepositoryInterface, ReminderInterface
{

    /**
     * Only completed reminders.
     *
     * @param $query
     * @return mixed
     */
    public function scopeCompleted($query)
    {
        return $query->whereIsCompleted(true);
    }

    /**
     * Create a new reminder.
     *
     * @param $userId
     * @return $this
     */
    public function createReminder($userId)
    {
        $this->code        = rand_string(40);
        $this->user_id     = $userId;
        $this->is_complete = false;

        $this->save();

        return $this;
    }

    /**
     * Complete a reminder.
     *
     * @param $userId
     * @param $code
     * @return bool
     */
    public function complete($userId, $code)
    {
        $reminder = $this->findByUserId($userId);

        if ($reminder instanceof ReminderInterface and $reminder->getCode() == $code) {

            $reminder->code         = null;
            $reminder->is_complete  = true;
            $reminder->completed_at = time();

            return $reminder;
        }

        return false;
    }

    /**
     * Find a reminder by a user ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findByUserId($userId)
    {
        $reminder = $this->whereUserId($userId)->first();

        return $reminder;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }
}
 