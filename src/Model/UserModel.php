<?php namespace Streams\Addon\Module\Users\Model;

use Addon\Module\Users\Presenter\UserPresenter;
use Cartalyst\Sentry\Users\Eloquent\User;
use Streams\Core\Contract\PresenterInterface;

class UserModel extends User implements PresenterInterface
{
    /**
     * Override the table used.
     *
     * @var string
     */
    public $table = 'users_users';

    /**
     * Is the user active?
     *
     * @return bool
     */
    public function isActivated()
    {
        return (bool)$this->is_activated;
    }

    /**
     * A shortcut method to get the name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Return a new presenter instance.
     *
     * @param $resource
     * @return UserPresenter|\Streams\Presenter\PresenterAbstract
     */
    public function newPresenter($resource)
    {
        return new UserPresenter($resource);
    }
}
