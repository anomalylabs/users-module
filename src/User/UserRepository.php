<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class UserRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserRepository implements UserRepositoryInterface
{

    /**
     * The user model.
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
     * Create a new user.
     *
     * @param $username
     * @param $email
     * @param $password
     * @return static
     */
    public function create($username, $email, $password)
    {
        $user = $this->model->newInstance();

        $user->email    = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();

        return $user;
    }

    /**
     * Delete an existing user.
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function delete($id)
    {
        $user = $this->model->find($id);

        $user->delete();

        return $user;
    }

    /**
     * Find a user by their credentials.
     *
     * @param array $credentials
     * @return null
     */
    public function findByCredentials(array $credentials)
    {
        $user = $this->model->where('email', $credentials['email'])->first();

        if ($user) {
            return app('hash')->check($credentials['password'], $user->password) ? $user : null;
        }

        return null;
    }
}
