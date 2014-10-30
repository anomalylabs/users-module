<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder;

use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderInterface;
use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface;
use Anomaly\Streams\Platform\Model\Users\UsersRemindersEntryModel;

class ReminderModel extends UsersRemindersEntryModel implements ReminderRepositoryInterface, ReminderInterface
{

    public function scopeCompleted($query)
    {
        return $query->whereIsCompleted(true);
    }

    public function createReminder($userId)
    {
        $this->code        = rand_string(40);
        $this->user_id     = $userId;
        $this->is_complete = false;

        $this->save();

        return $this;
    }

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

    public function findByUserId($userId)
    {
        $reminder = $this->whereUserId($userId)->first();

        return $reminder ? : false;
    }

    public function getCode()
    {
        return $this->code;
    }
}
 