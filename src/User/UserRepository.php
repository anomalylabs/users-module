<?php namespace Anomaly\UsersModule\User;

use Anomaly\UsersModule\Role\Contract\Role;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class UserRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserRepository implements \Anomaly\UsersModule\User\Contract\UserRepositoryInterface
{

    /**
     * The user model.
     *
     * @var UserInterfaceModel
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
     * @return UserInterface
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
     * @param UserInterface $user
     * @return UserInterface
     */
    public function delete(UserInterface $user)
    {
        $user->delete();

        return $user;
    }

    /**
     * Activate a user.
     *
     * @param UserInterface $user
     * @return UserInterface $user
     */
    public function activate(UserInterface $user)
    {
        $user->activated = true;

        $user->save();

        return $user;
    }

    /**
     * Deactivate a user.
     *
     * @param UserInterface $user
     * @return UserInterface
     */
    public function deactivate(UserInterface $user)
    {
        $user->activated = false;

        $user->save();

        return $user;
    }

    /**
     * Block a user.
     *
     * @param UserInterface $user
     * @return UserInterface
     */
    public function block(UserInterface $user)
    {
        $user->blocked = true;

        $user->save();

        return $user;
    }

    /**
     * Unblock a user.
     *
     * @param UserInterface $user
     * @return UserInterface
     */
    public function unblock(UserInterface $user)
    {
        $user->blocked = false;

        $user->save();

        return $user;
    }

    /**
     * Find a user.
     *
     * @param $id
     * @return null|UserInterface
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find a user by their credentials.
     *
     * @param array $credentials
     * @return null|UserInterface
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
     * @return null|UserInterface
     */
    public function findUserByUsername($username)
    {
        return $this->model->where('username', $username)->first();
    }

    /**
     * Find a user by their activation code.
     *
     * @param $code
     * @return null|UserInterface
     */
    public function findByActivationCode($code)
    {
        return $this->model->where('activation_code', $code)->first();
    }

    /**
     * Attach a role to a user.
     *
     * @param UserInterface $user
     * @param Role $role
     * @return UserInterface
     */
    public function attachRole(UserInterface $user, Role $role)
    {
        $user->roles()->attach($role);

        return $user;
    }
}
