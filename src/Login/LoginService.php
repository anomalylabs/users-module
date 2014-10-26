<?php namespace Anomaly\Streams\Addon\Module\Users\Login;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\Login\Command\LoginUserCommand;
use Anomaly\Streams\Addon\Module\Users\Login\Command\LogoutUserCommand;
use Anomaly\Streams\Addon\Module\Users\Authorization\AuthorizationService;

class LoginService
{
    use CommandableTrait;

    protected $authorization;

    function __construct(AuthorizationService $authorization)
    {
        $this->authorization = $authorization;
    }

    public function login(UserInterface $user, $remember = false)
    {
        $command = new LoginUserCommand($user->getUserId(), $remember);

        return $this->execute($command);
    }

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
 