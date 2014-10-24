<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

use Anomaly\Streams\Addon\Module\Users\Reminder\Event\ReminderWasCreatedEvent;
use Anomaly\Streams\Addon\Module\Users\Reminder\ReminderModel;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

class CreateReminderCommandHandler
{
    use DispatchableTrait;

    protected $reminder;

    function __construct(ReminderModel $reminder)
    {
        $this->reminder = $reminder;
    }

    public function handle(CreateReminderCommand $command)
    {
        $reminder = $this->reminder->createReminder($command->getUserId());

        $reminder->raise(new ReminderWasCreatedEvent($reminder));

        $this->dispatchEventsFor($reminder);

        return $reminder ? : false;
    }
}
 