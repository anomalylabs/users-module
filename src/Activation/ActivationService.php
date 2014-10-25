<?php namespace Anomaly\Streams\Addon\Module\Users\Activation;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\Activation\Command\ForceActivationCommand;
use Anomaly\Streams\Addon\Module\Users\Activation\Command\CreateActivationCommand;
use Anomaly\Streams\Addon\Module\Users\Activation\Command\RemoveActivationCommand;
use Anomaly\Streams\Addon\Module\Users\Activation\Command\CompleteActivationCommand;
use Anomaly\Streams\Addon\Module\Users\Activation\Command\CheckIfActivationExistsCommand;

class ActivationService
{
    use CommandableTrait;

    public function create(UserInterface $user)
    {
        $command = new CreateActivationCommand($user->getUserId());

        return $this->execute($command);
    }

    public function force(UserInterface $user)
    {
        $command = new ForceActivationCommand($user->getUserId());

        return $this->execute($command);
    }

    public function exists(UserInterface $user)
    {
        $command = new CheckIfActivationExistsCommand($user->getUserId());

        return $this->execute($command);
    }

    public function complete(UserInterface $user, $code)
    {
        $command = new CompleteActivationCommand($user->getUserId(), $code);

        return $this->execute($command);
    }

    public function remove(UserInterface $user)
    {
        $command = new RemoveActivationCommand($user->getAuthIdentifier());

        return $this->execute($command);
    }
}
 