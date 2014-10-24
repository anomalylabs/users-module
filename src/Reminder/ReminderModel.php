<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder;

use Anomaly\Streams\Platform\Model\Users\UsersRemindersEntryModel;

class ReminderModel extends UsersRemindersEntryModel
{
    public function scopeCompleted($query)
    {
        return $query->whereIsCompleted(true);
    }

    public function createReminder($userId)
    {
        $this->code         = rand_string(40);
        $this->user_id      = $userId;
        $this->is_completed = false;

        $this->save();

        return $this;
    }

    public function complete($userId, $code)
    {
        $reminder = $this->findByUserId($userId);

        if ($reminder and $reminder->code == $code) {

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
}
 