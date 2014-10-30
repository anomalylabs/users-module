<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Event;

use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderInterface;

class ReminderWasCompletedEvent
{

    protected $reminder;

    function __construct(ReminderInterface $reminder)
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
 