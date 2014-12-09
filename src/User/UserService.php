<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Laracasts\Commander\CommanderTrait;

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

    use CommanderTrait;

    /**
     * Register a new user.
     *
     * @param array $credentials
     * @param bool  $activate
     * @return mixed
     */
    public function register(array $credentials, $activate = false)
    {
        $user = $this->execute(
            'Anomaly\Streams\Addon\Module\Users\User\Command\CreateUserCommand',
            compact('credentials')
        );

        if ($activate) {

            $this->activate($user);
        }

        return $user;
    }

    /**
     * Activate a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function activate(UserInterface $user)
    {
        return $this->execute(
            'Anomaly\Streams\Addon\Module\Users\User\Command\ActivateUserCommand',
            compact('user')
        );
    }

    /**
     * Deactivate a user.
     *
     * @param UserInterface $user
     */
    public function deactivate(UserInterface $user)
    {
        $this->execute(
            'Anomaly\Streams\Addon\Module\Users\User\Command\DeactivateUserCommand',
            compact('user')
        );
    }

    /**
     * Complete activation for a user.
     *
     * @param UserInterface $user
     * @param               $code
     */
    public function complete(UserInterface $user, $code)
    {
        $this->execute(
            'Anomaly\Streams\Addon\Module\Users\User\Command\CompleteActivationCommand',
            compact('user', 'code')
        );
    }

    /**
     * Block a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function block(UserInterface $user)
    {
        return $this->execute(
            'Anomaly\Streams\Addon\Module\Users\User\Command\BlockUserCommand',
            compact('user')
        );
    }

    /**
     * Unblock a user.
     *
     * @param UserInterface $user
     */
    public function unblock(UserInterface $user)
    {
        $this->execute(
            'Anomaly\Streams\Addon\Module\Users\User\Command\UnblockUserCommand',
            compact('user')
        );
    }
}
 