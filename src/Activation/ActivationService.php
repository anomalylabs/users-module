<?php namespace Anomaly\Streams\Addon\Module\Users\Activation;

use Anomaly\Streams\Addon\Module\Users\Activation\Command\CheckIfActivationExistsCommand;
use Anomaly\Streams\Addon\Module\Users\Activation\Command\CompleteActivationCommand;
use Anomaly\Streams\Addon\Module\Users\Activation\Command\CreateActivationCommand;
use Anomaly\Streams\Addon\Module\Users\Activation\Command\RemoveActivationCommand;
use Anomaly\Streams\Addon\Module\Users\User\UserInterface;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

class ActivationService
{
    use CommandableTrait;

    public function create(UserInterface $user)
    {
        $command = new CreateActivationCommand($user->getAuthIdentifier());

        return $this->execute($command);
    }

    public function exists(UserInterface $user)
    {
        $command = new CheckIfActivationExistsCommand($user->getAuthIdentifier());

        return $this->execute($command);
    }

    public function complete(UserInterface $user, $code)
    {
        $command = new CompleteActivationCommand($user->getAuthIdentifier(), $code);

        return $this->execute($command);
    }

    public function remove(UserInterface $user)
    {
        $command = new RemoveActivationCommand($user->getAuthIdentifier());

        return $this->execute($command);
    }
}
 