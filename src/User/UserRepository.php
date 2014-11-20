<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class UserRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserRepository implements UserRepositoryInterface
{

    /**
     * The model object.
     *
     * @var UserModel
     */
    protected $model;

    /**
     * Create a new UserRepository instance.
     *
     * @param UserModel $model
     */
    function __construct(UserModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a user by it's ID.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find a user by it's credentials.
     *
     * @param array $credentials
     * @return mixed
     */
    public function findByCredentials(array $credentials)
    {
        $user = $this->model->where(
            function (Builder $query) use ($credentials) {

                return $query->where('email', $credentials['login'])->orWhere('username', $credentials['login']);
            }
        )->first();

        if (!$user instanceof UserInterface) {

            return null;
        }

        if (!app('hash')->check($credentials['password'], $user->password)) {

            return null;
        }

        return $user;
    }

    /**
     * Find a user by a persistence code.
     *
     * @param $code
     * @return mixed
     */
    public function findByPersistenceCode($code)
    {
        return $this->model
            ->join('users_persistences', 'users_persistences.user_id', 'users_users.id')
            ->where('users_persistences.code', $code)
            ->first();
    }

    /**
     * Touch the last login stamp.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function touchLogin(UserInterface $user)
    {
        $user->last_login_at = time();

        $user->save();
    }

    /**
     * Touch the last activity stamp and IP.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function touch(UserInterface $user)
    {
        $user->last_activity_at = time();

        $user->ip_address = ip();

        $user->save();
    }

    /**
     * Create a new user.
     *
     * @param array $credentials
     * @return mixed
     */
    public function create(array $credentials)
    {
        $user = $this->model->newInstance();

        $user->email    = $credentials['email'];
        $user->username = $credentials['username'];
        $user->password = $credentials['password'];

        $user->save();

        return $user;
    }

    /**
     * Update an existing user.
     *
     * @param UserInterface $user
     * @param array         $credentials
     * @return mixed
     */
    public function update(UserInterface $user, array $credentials)
    {
        if (isset($credentials['email'])) {

            $user->email = $credentials['email'];
        }

        if (isset($credentials['username'])) {

            $user->username = $credentials['username'];
        }

        if (isset($credentials['password'])) {

            $user->password = $credentials['password'];
        }

        $user->save();

        return $user;
    }
}
 