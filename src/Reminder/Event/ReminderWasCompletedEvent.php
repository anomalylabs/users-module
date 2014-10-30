<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Event;

use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderInterface;

/**
 * Class ReminderWasCompletedEvent
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder\Event
 */
class ReminderWasCompletedEvent
{

    /**
     * The reminder interface.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderInterface
     */
    protected $reminder;

    /**
     * Create a new ReminderWasCompletedEvent instance.
     *
     * @param ReminderInterface $reminder
     */
    function __construct(ReminderInterface $reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Get the reminder interface.
     *
     * @return mixed
     */
    public function getReminder()
    {
        return $this->reminder;
    }
}
 