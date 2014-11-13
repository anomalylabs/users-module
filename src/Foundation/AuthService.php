<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation;

use Anomaly\Streams\Addon\Module\Users\Foundation\Command\AuthenticateCredentialsCommand;
use Anomaly\Streams\Addon\Module\Users\Foundation\Command\CheckAuthorizationCommand;
use Anomaly\Streams\Addon\Module\Users\Foundation\Command\GetUserCommand;
use Anomaly\Streams\Addon\Module\Users\Foundation\Command\LoginUserCommand;
use Anomaly\Streams\Addon\Module\Users\Foundation\Command\LogoutUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

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

    use CommandableTrait;

    /**
     * Runtime cache.
     *
     * @var array
     */
    protected $cache = [];

    /**
     * Check if a user is logged in.
     *
     * @return mixed
     */
    public function check()
    {
        if (isset($this->cache['current'])) {

            return $this->cache['current'];
        }

        return $this->cache['current'] = $this->execute(new CheckAuthorizationCommand());
    }

    /**
     * Authenticate a set of credentials.
     *
     * @param array $credentials
     * @return mixed
     */
    public function authenticate(array $credentials)
    {
        return $this->execute(new AuthenticateCredentialsCommand($credentials));
    }

    /**
     * Log a user in.
     *
     * @param UserInterface $user
     * @param bool          $remember
     */
    public function login(UserInterface $user, $remember = false)
    {
        $this->execute(new LoginUserCommand($user, $remember));
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

            $this->execute(new LogoutUserCommand($user, $forget));
        }
    }

    /**
     * Get a user.
     *
     * @param null $id
     * @return mixed
     */
    public function getUser($id = 'current')
    {
        if (isset($this->cache[$id])) {

            return $this->cache[$id];
        }

        if (is_numeric($id)) {

            return $this->cache[$id] = $this->execute(new GetUserCommand($id));
        }

        return $this->cache[$id] = $this->check();
    }
}
 