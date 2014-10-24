<?php namespace Anomaly\Streams\Addon\Module\Users\User\Event;

use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class PasswordWasChangedEvent
{
    protected $user;

    function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}
 