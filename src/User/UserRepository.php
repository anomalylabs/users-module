<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class UserRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserRepository extends EntryRepository implements UserRepositoryInterface
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
     * Find a user by their email.
     *
     * @param $email
     * @return null|UserInterface
     */
    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    /**
     * Find a user by their username.
     *
     * @param $username
     * @return null|UserInterface
     */
    public function findByUsername($username)
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
     * @param RoleInterface $role
     * @return UserInterface
     */
    public function attachRole(UserInterface $user, RoleInterface $role)
    {
        $user->roles()->attach($role);

        return $user;
    }

    /**
     * Update permissions for a user.
     *
     * @param UserInterface $user
     * @param array         $permissions
     * @return UserInterface
     */
    public function updatePermissions(UserInterface $user, array $permissions)
    {
        $user->permissions = $permissions;

        $user->save();

        return $user;
    }

    /**
     * Touch a user's last activity and IP.
     *
     * @param UserInterface $user
     */
    public function touchLastActivity(UserInterface $user)
    {
        $user->last_activity_at = time();
        $user->ip_address       = $_SERVER['REMOTE_ADDR'];

        $user->save();
    }

    /**
     * Touch a user's last login.
     *
     * @param UserInterface $user
     */
    public function touchLastLogin(UserInterface $user)
    {
        $user->last_login_at = time();

        $user->save();
    }
}
