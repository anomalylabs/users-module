<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\User\Contract\User;

/**
 * Class UserRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserRepository implements \Anomaly\UsersModule\User\Contract\UserRepository
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
     * Delete a user.
     *
     * @param User $user
     * @return bool
     */
    public function delete($id)
    {
        $user = $this->find($id);

        return $user->delete();
    }

    /**
     * Activate a user.
     *
     * @param $id
     * @return mixed
     */
    public function activate($id)
    {
        $user = $this->find($id);

        $user->activated    = true;
        $user->activated_at = time();

        return $user->save();
    }

    /**
     * Find a user.
     *
     * @param $id
     * @return null|User
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find a user by their credentials.
     *
     * @param array $credentials
     * @return null|User
     */
    public function findByCredentials(array $credentials)
    {
        $user = $this->model->where('email', $credentials['email'])->first();

        if ($user) {
            return app('hash')->check($credentials['password'], $user->password) ? $user : null;
        }

        return null;
    }

    /**
     * Find a user by their activation code.
     *
     * @param $code
     * @return null|User
     */
    public function findByActivationCode($code)
    {
        return $this->model->where('activation_code', $code)->first();
    }
}
