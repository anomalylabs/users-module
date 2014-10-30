<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Event;

use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderInterface;

/**
 * Class ReminderWasCreatedEvent
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder\Event
 */
class ReminderWasCreatedEvent
{

    /**
     * The reminder interface object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderInterface
     */
    protected $reminder;

    /**
     * Create a new ReminderWasCreatedEvent instance.
     *
     * @param ReminderInterface $reminder
     */
    function __construct(ReminderInterface $reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Get the reminder.
     *
     * @return mixed
     */
    public function getReminder()
    {
        return $this->reminder;
    }
}
 