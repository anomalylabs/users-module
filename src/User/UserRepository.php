<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Entry\EntryRepository;
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
     * Touch a user's last activity and IP.
     *
     * @param UserInterface $user
     */
    public function touchLastActivity(UserInterface $user)
    {
        $user->last_activity_at = time();
        $user->ip_address       = $_SERVER['REMOTE_ADDR'];

        return $this->save($user);
    }

    /**
     * Touch a user's last login.
     *
     * @param UserInterface $user
     */
    public function touchLastLogin(UserInterface $user)
    {
        $user->last_login_at = time();

        return $this->save($user);
    }
}
