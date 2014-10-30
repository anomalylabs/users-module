<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Reminder\Event\ReminderWasCompletedEvent;
use Anomaly\Streams\Addon\Module\Users\User\Command\ChangePasswordCommand;
use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

/**
 * Class CompleteReminderCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder\Command
 */
class CompleteReminderCommandHandler
{

    use CommandableTrait;
    use DispatchableTrait;

    /**
     * The user repository interface object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new CompleteReminderCommandHandler instance.
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
     * @param CompleteReminderCommand $command
     * @return bool
     */
    public function handle(CompleteReminderCommand $command)
    {
        $reminder = $this->repository->complete($command->getUserId(), $command->getCode());

        if ($reminder instanceof ReminderRepositoryInterface) {

            $reminder->raise(new ReminderWasCompletedEvent($reminder));

            $this->dispatchEventsFor($reminder);

            $command = new ChangePasswordCommand($command->getUserId(), $command->getPassword());

            $this->execute($command);
        }

        return $reminder ? : false;
    }
}
 