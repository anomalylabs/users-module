<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderInterface;
use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Reminder\Event\ReminderWasCreatedEvent;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

class CreateReminderCommandHandler
{

    use DispatchableTrait;

    protected $repository;

    function __construct(ReminderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CreateReminderCommand $command)
    {
        $reminder = $this->repository->createReminder($command->getUserId());

        if ($reminder instanceof ReminderInterface) {

            $reminder->raise(new ReminderWasCreatedEvent($reminder));

            $this->dispatchEventsFor($reminder);
        }

        return $reminder;
    }
}
 