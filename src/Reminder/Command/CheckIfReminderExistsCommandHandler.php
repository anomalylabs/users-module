<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

use Anomaly\Streams\Addon\Module\Users\Reminder\Contract\ReminderRepositoryInterface;

class CheckIfReminderExistsCommandHandler
{

    protected $repository;

    function __construct(ReminderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CheckIfReminderExistsCommand $command)
    {
        return $this->repository->findByUserId($command->getUserId());
    }
}
 