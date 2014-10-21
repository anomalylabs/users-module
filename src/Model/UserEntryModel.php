<?php namespace Anomaly\Streams\Module\Users\Model;

use Addon\Module\Users\Presenter\UserPresenter;
use Streams\Core\Model\Users\UsersUsersEntryModel;

class UserEntryModel extends UsersUsersEntryModel
{
    /**
     * Return a new presenter instance.
     * 
     * @param $resource
     * @return UserPresenter|\Streams\Entry\Presenter\EntryPresenter|\Streams\Presenter\EloquentPresenter
     */
    public function newPresenter($resource)
    {
        return new UserPresenter($resource);
    }
}
