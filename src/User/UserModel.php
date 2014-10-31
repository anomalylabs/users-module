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
     * Register a user.
     *
     * @param array $credentials
     * @return $this
     */
    public function registerUser(array $credentials)
    {
        return $this->createUser($credentials);
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
        $user = $this->findUserById($userId);

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
    public function changeUserPassword($userId, $password)
    {
        $user = $this->findUserById($userId);

        if ($user) {

            $this->password = $password;

            $user->save();

            $user->fireModelEvent('password_changed');
        }

        return $user;
    }

    /**
     * Find a user by login.
     *
     * @param $login
     * @return mixed
     */
    public function findUserByLogin($login)
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
    public function findUserByLoginAndPassword($login, $password)
    {
        if ($user = $this->findUserByLogin($login)) {

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
    public function findUserById($userId)
    {
        return $this->find($userId);
    }

    /**
     * Touch last activity of a user.
     *
     * @param $userId
     */
    public function updateLastActivity($userId)
    {
        $this->whereId($userId)->update(['last_activity_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Touch last login of user.
     *
     * @param $userId
     */
    public function updateLastLoggedIn($userId)
    {
        $this->whereId($userId)->update(['last_login_at' => date('Y-m-d H:i:s')]);
    }

    /**
     * Hash the password before setting the password.
     *
     * @param $password
     */
    public function setPassword($password)
    {
        $this->setAttribute('password', $password);
    }

    /**
     * Set the password attribute.
     *
     * @param $password
     */
    protected function setPasswordAttribute($password)
    {
        $this->attributes['password'] = app('hash')->make($password);
    }

    /**
     * Get the user ID.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getKey();
    }
}
 