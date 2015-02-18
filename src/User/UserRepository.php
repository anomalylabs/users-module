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
     * @return User
     */
    public function delete(User $user)
    {
        $user->delete();

        return $user;
    }

    /**
     * Activate a user.
     *
     * @param User $user
     * @return User $user
     */
    public function activate(User $user)
    {
        $user->activated = true;

        $user->save();

        return $user;
    }

    /**
     * Deactivate a user.
     *
     * @param User $user
     * @return User
     */
    public function deactivate(User $user)
    {
        $user->activated = false;

        $user->save();

        return $user;
    }

    /**
     * Block a user.
     *
     * @param User $user
     * @return User
     */
    public function block(User $user)
    {
        $user->blocked = true;

        $user->save();

        return $user;
    }

    /**
     * Unblock a user.
     *
     * @param User $user
     * @return User
     */
    public function unblock(User $user)
    {
        $user->blocked = false;

        $user->save();

        return $user;
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
     * Find a user by their username.
     *
     * @param $username
     * @return null|User
     */
    public function findUserByUsername($username)
    {
        return $this->model->where('username', $username)->first();
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
