<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface;

/**
 * Class CheckIfReminderExistsCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder\Command
 */
class CheckIfReminderExistsCommandHandler
{

    /**
     * The reminder interface object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new CheckIfReminderExistsCommandHandler instance.
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
     * @param CheckIfReminderExistsCommand $command
     * @return mixed
     */
    public function handle(CheckIfReminderExistsCommand $command)
    {
        return $this->repository->findByUserId($command->getUserId());
    }
}
 