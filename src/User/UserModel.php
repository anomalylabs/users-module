<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;

class UserModel extends UsersUsersEntryModel
{
    protected $hidden = ['password'];

    public function findByLoginAndPassword($login, $password)
    {
        return $this
            ->where(
                function ($query) use ($login) {

                    $query->whereUsername($login)->orWhereEmail($login);

                }
            )
            ->wherePassword($password)
            ->first();
    }

    public function register($credentials)
    {
        $this->email    = $credentials['email'];
        $this->username = $credentials['username'];
        $this->password = $credentials['password'];

        $this->save();

        return $this;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = app('hash')->make($password);
    }
}
 