<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Illuminate\Database\Eloquent\Builder;
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
        $user = $this
            ->where(
                function (Builder $query) use ($login) {

                    $query->where('username', $login)->orWhere('email', $login);

                }
            )
            ->first();

        if ($user) {

            return app('hash')->check($password, $user->password) ? $user : null;

        }

        return null;
    }

    public function findByUserId($userId)
    {
        return $this->find($userId);
    }

    public function setPasswordAttribute($password)
    {
        return app('hash')->make($password);
    }

    public function getUserId()
    {
        return $this->getKey();
    }
}
 