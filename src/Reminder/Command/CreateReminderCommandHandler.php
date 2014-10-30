<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderInterface;
use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Reminder\Event\ReminderWasCreatedEvent;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

/**
 * Class CreateReminderCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder\Command
 */
class CreateReminderCommandHandler
{

    use DispatchableTrait;

    /**
     * The reminder repository interface object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new CreateReminderCommandHandler instance.
     *
     * @param ReminderRepositoryInterface $repository
     */
    function __construct(ReminderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param CreateReminderCommand $command
     * @return mixed
     */
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
 