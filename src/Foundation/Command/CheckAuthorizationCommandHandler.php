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

    /**
     * Handle the command.
     *
     * @param PersistenceRepositoryInterface $persistences
     * @param UserRepositoryInterface        $users
     * @return bool|mixed
     */
    public function handle(PersistenceRepositoryInterface $persistences, UserRepositoryInterface $users)
    {
        $user = $this->getUser($persistences);

        if (!$user instanceof UserInterface) {

            return false;
        }

        $this->dispatch(new UserWasAuthorizedEvent($user));

        return $user;
    }

    /**
     * Get the user from persistence.
     *
     * @param PersistenceRepositoryInterface $persistences
     * @return bool|mixed
     */
    protected function getUser(
        PersistenceRepositoryInterface $persistences
    ) {
        $code = $persistences->check();

        if (!$code) {

            return false;
        }

        $persistences = $persistences->findByCode($code);

        if (!$persistences instanceof PersistenceInterface) {

            return false;
        }

        return $persistences->getUser();
    }
}
 