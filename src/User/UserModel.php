<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;

class UserModel extends UsersUsersEntryModel implements UserInterface, UserRepositoryInterface
{
    protected $hidden = ['password'];

    public function createUser(array $credentials)
    {
        $this->email    = $credentials['email'];
        $this->username = $credentials['username'];
        $this->password = $credentials['password'];

        $this->save();

        return $this;
    }

    public function updateUser($userId, array $credentials, array $data = [])
    {
        $user = $this->findByUserId($userId);

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

    public function changePassword($userId, $password)
    {
        $user = $this->findByUserId($userId);

        if ($user) {

            $this->password = $password;

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

    public function findByUserId($userId)
    {
        return $this->find($userId);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = app('hash')->make($password);
    }

    public function getUserId()
    {
        return $this->getKey();
    }
}
 