<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\Role\Contract\Role;
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
     * @param array $credentials
     * @return User
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
     * Delete a user.
     *
     * @param User $user
     * @return bool
     */
    public function delete(User $user)
    {
        $user = $this->find($user->getId());

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

        $user->activated = true;

        return $user->save();
    }

    /**
     * Deactivate a user.
     *
     * @param $id
     * @return mixed
     */
    public function deactivate($id)
    {
        $user = $this->find($id);

        $user->activated = false;

        return $user->save();
    }

    /**
     * Block a user.
     *
     * @param $id
     * @return mixed
     */
    public function block($id)
    {
        $user = $this->find($id);

        $user->blocked = true;

        return $user->save();
    }

    /**
     * Unblock a user.
     *
     * @param $id
     * @return mixed
     */
    public function unblock($id)
    {
        $user = $this->find($id);

        $user->blocked = false;

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

    /**
     * Attach a role to a user.
     *
     * @param User $user
     * @param Role $role
     * @return User
     */
    public function attachRole(User $user, Role $role)
    {
        $user->roles()->attach($role);

        return $user;
    }
}
