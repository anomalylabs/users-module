<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Command\ActivateUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\CompleteActivationCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\CreateUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\DeactivateUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class UserService
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserService
{

    use CommandableTrait;

    /**
     * Register a new user.
     *
     * @param array $credentials
     * @param bool  $activate
     * @return mixed
     */
    public function register(array $credentials, $activate = false)
    {
        $user = $this->execute(new CreateUserCommand($credentials));

        if ($activate) {

            $this->activate($user);
        }

        return $user;
    }

    /**
     * Activate a user.
     *
     * @param UserInterface $user
     */
    public function activate(UserInterface $user)
    {
        $this->execute(new ActivateUserCommand($user));
    }

    /**
     * Deactivate a user.
     *
     * @param UserInterface $user
     */
    public function deactivate(UserInterface $user)
    {
        $this->execute(new DeactivateUserCommand($user));
    }

    /**
     * Complete activation for a user.
     *
     * @param UserInterface $user
     * @param               $code
     */
    public function complete(UserInterface $user, $code)
    {
        $this->execute(new CompleteActivationCommand($user, $code));
    }
}
 