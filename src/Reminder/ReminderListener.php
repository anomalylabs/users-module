<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder;

use Anomaly\Streams\Platform\Support\Listener;
use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\Reminder\Event\ReminderWasCreatedEvent;
use Anomaly\Streams\Addon\Module\Users\Reminder\Event\ReminderWasCompletedEvent;

class ReminderListener extends Listener
{
    use CommandableTrait;

    public function whenReminderWasCreated(ReminderWasCreatedEvent $event)
    {
        // Now would be a good time to fire off those emails son.
    }

    public function whenReminderWasCompleted(ReminderWasCompletedEvent $event)
    {
        // Now would be a good time to fire off those emails son.
    }
}
 