<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

use Anomaly\Streams\Addon\Module\Users\User\Command\ChangePasswordCommand;
use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\Reminder\ReminderModel;
use Anomaly\Streams\Addon\Module\Users\Reminder\Event\ReminderWasCompletedEvent;

class CompleteReminderCommandHandler
{
    use CommandableTrait;
    use DispatchableTrait;

    protected $reminder;

    function __construct(ReminderModel $reminder)
    {
        $this->reminder = $reminder;
    }

    public function handle(CompleteReminderCommand $command)
    {
        $reminder = $this->reminder->complete($command->getUserId(), $command->getCode());

        if ($reminder) {

            $reminder->raise(new ReminderWasCompletedEvent($reminder));

            $this->dispatchEventsFor($reminder);

            $command = new ChangePasswordCommand($command->getUserId(), $command->getPassword());

            $this->execute($command);

        }

        return $reminder ? : false;
    }
}
 