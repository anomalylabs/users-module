<?php namespace Anomaly\Streams\Addon\Module\Users\Foundation\Command;

use Anomaly\Streams\Addon\Module\Users\Foundation\Event\UserWasAuthorizedEvent;
use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceInterface;
use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

/**
 * Class CheckAuthorizationCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Foundation\Command
 */
class CheckAuthorizationCommandHandler
{

    use DispatchableTrait;

    protected $persistences;

    function __construct(PersistenceRepositoryInterface $persistences)
    {
        $this->persistences = $persistences;
    }

    /**
     * Handle the command.
     *
     * @param PersistenceRepositoryInterface $persistences
     * @param UserRepositoryInterface        $users
     * @return bool|mixed
     */
    public function handle(CheckAuthorizationCommand $command)
    {
        $user = $this->getUser();

        if (!$user instanceof UserInterface) {

            return false;
        }

        $this->dispatch(new UserWasAuthorizedEvent($user));

        return $user;
    }

    /**
     * Get the user from persistence.
     *
     * @return bool|mixed
     */
    protected function getUser()
    {
        $code = $this->persistences->check();

        if (!$code) {

            return false;
        }

        $persistence = $this->persistences->findByCode($code);

        if (!$persistence instanceof PersistenceInterface) {

            return false;
        }

        return $persistence->getUser();
    }
}
 