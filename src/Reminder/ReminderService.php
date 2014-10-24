<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\User\UserInterface;
use Anomaly\Streams\Addon\Module\Users\Reminder\Command\CreateReminderCommand;
use Anomaly\Streams\Addon\Module\Users\Reminder\Command\CompleteReminderCommand;
use Anomaly\Streams\Addon\Module\Users\Reminder\Command\CheckIfReminderExistsCommand;

class ReminderService
{
    use CommandableTrait;

    public function create(UserInterface $user)
    {
        $command = new CreateReminderCommand($user->getAuthIdentifier());

        return $this->execute($command);
    }

    public function exists(UserInterface $user)
    {
        $command = new CheckIfReminderExistsCommand($user->getAuthIdentifier());

        return $this->execute($command);
    }

    public function complete(UserInterface $user, $code, $password)
    {
        $command = new CompleteReminderCommand($user->getAuthIdentifier(), $code, $password);

        return $this->execute($command);
    }
}
 