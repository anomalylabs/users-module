<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;

class UserModel extends UsersUsersEntryModel
{
    protected $hidden = ['password'];

    public function createUser($credentials)
    {
        $this->email    = $credentials['email'];
        $this->username = $credentials['username'];
        $this->password = $credentials['password'];

        $this->save();

        return $this;
    }

    public function updateUser($userId, $credentials, $data)
    {
        $user = $this->find($userId);

        if ($user) {

            $user->fill($data);

            if (isset($credentials['email'])) {

                $user->email = $credentials['email'];

            }

            if (isset($credentials['username'])) {

                $this->username = $credentials['username'];

            }

            $user->save();

        }

        return $user;
    }

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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = app('hash')->make($password);
    }
}
 