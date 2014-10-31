<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;
use Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class UserModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserModel extends UsersUsersEntryModel implements UserInterface, UserRepositoryInterface
{

    /**
     * Hide these attributes from toJson / toArray.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * Create a new user.
     *
     * @param array $credentials
     * @return $this
     */
    public function createUser(array $credentials)
    {
        $this->email    = $credentials['email'];
        $this->username = $credentials['username'];
        $this->password = $credentials['password'];

        $this->save();

        return $this;
    }

    /**
     * Update an existing user.
     *
     * @param       $userId
     * @param array $credentials
     * @param array $data
     * @return \Illuminate\Support\Collection|null|static
     */
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

    /**
     * Change the password for a user.
     *
     * @param $userId
     * @param $password
     * @return \Illuminate\Support\Collection|null|static
     */
    public function changePassword($userId, $password)
    {
        $user = $this->findByUserId($userId);

        if ($user) {

            $this->password = $password;

            $user->save();
        }

        return $user;
    }

    /**
     * Find a user by login.
     *
     * @param $login
     * @return mixed
     */
    public function findByLogin($login)
    {
        return $this
            ->where(
                function (Builder $query) use ($login) {

                    $query->where('email', $login)->orWhere('username', $login);
                }
            )
            ->first();
    }

    /**
     * Find a user by login and password.
     *
     * @param $login
     * @param $password
     * @return mixed|null
     */
    public function findByLoginAndPassword($login, $password)
    {
        if ($user = $this->findByLogin($login)) {

            return app('hash')->check($password, $user->password) ? $user : null;
        }

        return null;
    }

    /**
     * Find a user by Id.
     *
     * @param $userId
     * @return \Illuminate\Support\Collection|null|static
     */
    public function findByUserId($userId)
    {
        return $this->find($userId);
    }

    /**
     * Touch last activity of a user.
     *
     * @param $userId
     */
    public function touchLastActivity($userId)
    {
        $this->whereId($userId)->update(['last_activity_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Touch last login of user.
     *
     * @param $userId
     */
    public function touchLastLogin($userId)
    {
        $this->whereId($userId)->update(['last_login_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Hash the password before setting the password.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = app('hash')->make($password);
    }

    /**
     * Get the user ID.
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->getKey();
    }

    /**
     * Return the blocked flag.
     *
     * @return mixed
     */
    public function isBlocked()
    {
        return ($this->is_blocked);
    }
}
 