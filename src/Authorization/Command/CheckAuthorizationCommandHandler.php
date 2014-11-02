<?php namespace Anomaly\Streams\Addon\Module\Users\Authorization\Command;

use Anomaly\Streams\Addon\Module\Users\Exception\UserBlockedException;
use Anomaly\Streams\Addon\Module\Users\Exception\UserNotActivatedException;
use Anomaly\Streams\Addon\Module\Users\Extension\CheckInterface;
use Anomaly\Streams\Addon\Module\Users\Session\SessionManager;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;
use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Platform\Traits\EventableTrait;

/**
 * Class CheckAuthorizationCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Authorization\Command
 */
class CheckAuthorizationCommandHandler
{

    use EventableTrait;
    use DispatchableTrait;

    /**
     * The session manager.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Session\SessionManager
     */
    protected $session;

    /**
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new CheckAuthorizationCommandHandler instance.
     *
     * @param SessionManager          $session
     * @param UserRepositoryInterface $repository
     */
    function __construct(SessionManager $session, UserRepositoryInterface $repository)
    {
        $this->session    = $session;
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param CheckAuthorizationCommand $command
     * @return mixed|null
     */
    public function handle(CheckAuthorizationCommand $command)
    {
        $userId = $this->session->check();

        $user = $this->repository->findUserById($userId);

        if ($user instanceof UserInterface) {

            return $this->runSecurityChecks($user);
        }

        return null;
    }

    /**
     * Run the security checks.
     *
     * These are powered by the extensions layer.
     *
     * @param UserInterface $user
     */
    protected function runSecurityChecks(UserInterface $user)
    {
        $securityChecks = app('streams.extensions')->find('module.users::*.check');

        foreach ($securityChecks as $securityCheck) {

            if ($securityCheck instanceof CheckInterface and $handler = $securityCheck->toHandler()) {

                try {

                    app()->call($handler . '@check', compact('user'));
                } catch (UserNotActivatedException $e) {

                    app('streams.messages')->add('error', 'module.users::error.account_not_activated');

                    return null;
                } catch (UserBlockedException $e) {

                    app('streams.messages')->add('error', 'module.users::error.account_blocked');

                    return null;
                }
            }
        }

        return $user;
    }
}
 