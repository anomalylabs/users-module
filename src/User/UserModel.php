<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;
use Illuminate\Auth\Authenticatable;

class UserModel extends UsersUsersEntryModel implements UserInterface, \Illuminate\Contracts\Auth\Authenticatable
{

    use Authenticatable;

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = app('hash')->make($password);
    }
}
