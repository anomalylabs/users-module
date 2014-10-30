<?php namespace Anomaly\Streams\Addon\Module\Users\Reminder;

use Anomaly\Streams\Addon\Module\Users\Reminder\Command\CheckIfReminderExistsCommand;
use Anomaly\Streams\Addon\Module\Users\Reminder\Command\CompleteReminderCommand;
use Anomaly\Streams\Addon\Module\Users\Reminder\Command\CreateReminderCommand;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class ReminderService
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Reminder
 */
class ReminderService
{

    use CommandableTrait;

    /**
     * Create a new reminder for a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function create(UserInterface $user)
    {
        $command = new CreateReminderCommand($user->getAuthIdentifier());

        return $this->execute($command);
    }

    /**
     * Check if a reminder exists for a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function exists(UserInterface $user)
    {
        $command = new CheckIfReminderExistsCommand($user->getAuthIdentifier());

        return $this->execute($command);
    }

    /**
     * Complete a reminder.
     *
     * @param UserInterface $user
     * @param               $code
     * @param               $password
     * @return mixed
     */
    public function complete(UserInterface $user, $code, $password)
    {
        $command = new CompleteReminderCommand($user->getAuthIdentifier(), $code, $password);

        return $this->execute($command);
    }
}
 