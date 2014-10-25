<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Event\UserWasLoggedInEvent;
use Anomaly\Streams\Platform\Traits\EventableTrait;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceService;

class UserSession
{
    use EventableTrait;
    use DispatchableTrait;

    protected $persistence;

    function __construct(PersistenceService $persistence)
    {
        $this->persistence = $persistence;
    }

    public function login(UserInterface $user, $remember = false)
    {
        $this->updateSession($user->getUserId());

        if ($remember) {

            $this->persistence->persist($user);

        }

        $this->raise(new UserWasLoggedInEvent($user));

        $this->dispatchEventsFor($this);
    }

    public function logout()
    {
        // TODO: Clear the session.
    }

    protected function updateSession($userId)
    {
        app('session')->put('login_' . md5(get_class($this)), $userId);

        app('session')->migrate(true);
    }

    /**
     * @param mixed $user
     * return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }
}
 