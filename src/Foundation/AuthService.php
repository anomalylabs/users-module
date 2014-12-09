<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Laracasts\Commander\CommanderTrait;

/**
 * Class AuthService
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation
 */
class AuthService
{

    use CommanderTrait;

    /**
     * Check if a user is logged in.
     *
     * @return mixed
     */
    public function check()
    {
        return $this->execute('\Anomaly\Streams\Addon\Module\Users\Foundation\Command\CheckAuthorizationCommand');
    }

    /**
     * Authenticate a set of credentials.
     *
     * @param array $credentials
     * @return mixed
     */
    public function authenticate(array $credentials)
    {
        return $this->execute(
            'Anomaly\Streams\Addon\Module\Users\Foundation\Command\AuthenticateCredentialsCommand',
            compact('credentials')
        );
    }

    /**
     * Log a user in.
     *
     * @param UserInterface $user
     * @param bool          $remember
     */
    public function login(UserInterface $user, $remember = false)
    {
        $this->execute(
            'Anomaly\Streams\Addon\Module\Users\Foundation\Command\LoginUserCommand',
            compact('user', 'remember')
        );
    }

    /**
     * Logout the current user.
     */
    public function logout(UserInterface $user = null)
    {
        $forget = false;

        if ($user == null) {

            $forget = true;

            $user = $this->check();
        }

        if ($user instanceof UserInterface) {

            $this->execute(
                'Anomaly\Streams\Addon\Module\Users\Foundation\Command\LogoutUserCommand',
                compact('user', 'forget')
            );
        }
    }

    /**
     * Get a user.
     *
     * @param null $id
     * @return mixed
     */
    public function getUser($id = null)
    {
        if ($id) {

            return $this->execute(
                'Anomaly\Streams\Addon\Module\Users\Foundation\Command\GetUserCommand',
                compact('id')
            );
        }

        return $this->check();
    }
}
 