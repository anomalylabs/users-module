<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Event;

use Anomaly\Streams\Addon\Module\Users\Reminder\ReminderModel;

class ReminderWasCompletedEvent
{
    protected $reminder;

    function __construct(ReminderModel $reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * @return mixed
     */
    public function getReminder()
    {
        return $this->reminder;
    }
}
 