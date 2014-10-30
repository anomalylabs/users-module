<?php namespace Anomaly\Streams\Addon\Module\Users\Session;

use Anomaly\Streams\Addon\Module\Users\Authorization\AuthorizationService;
use Anomaly\Streams\Addon\Module\Users\Session\Command\LoginUserCommand;
use Anomaly\Streams\Addon\Module\Users\Session\Command\LogoutUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class SessionService
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Session
 */
class SessionService
{

    use CommandableTrait;

    /**
     * The authorization service.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Authorization\AuthorizationService
     */
    protected $authorization;

    /**
     * Create a new SessionService instance.
     *
     * @param AuthorizationService $authorization
     */
    function __construct(AuthorizationService $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * Login a user.
     *
     * @param UserInterface $user
     * @param bool          $remember
     * @return mixed
     */
    public function login(UserInterface $user, $remember = false)
    {
        $command = new LoginUserCommand($user->getUserId(), $remember);

        return $this->execute($command);
    }

    /**
     * Logout the current or provided user.
     *
     * @param UserInterface $user
     */
    public function logout(UserInterface $user = null)
    {
        if (!$user) {

            $user = $this->authorization->check();
        }

        if ($user) {

            $command = new LogoutUserCommand($user->getUserId());

            $this->execute($command);
        }
    }
}
 