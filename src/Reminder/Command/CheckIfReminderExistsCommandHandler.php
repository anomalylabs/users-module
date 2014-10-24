<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder\Command;

use Anomaly\Streams\Addon\Module\Users\Reminder\ReminderModel;

class CheckIfReminderExistsCommandHandler
{
    protected $reminder;

    function __construct(ReminderModel $reminder)
    {
        $this->reminder = $reminder;
    }

    public function handle(CheckIfReminderExistsCommand $command)
    {
        return $this->reminder->findByUserId($command->getUserId());
    }
}
 