<?php namespace Anomaly\Streams\Addon\Module\Users\User\Contract;

/**
 * Interface UserRepositoryInterface
 *
 * This interface assures that other implementations of
 * users can operate in the users module successfully.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Contract
 */
interface UserRepositoryInterface
{

    /**
     * Create a user.
     *
     * @param array $credentials
     * @return mixed
     */
    public function createUser(array $credentials);

    /**
     * Register a user.
     *
     * @param array $credentials
     * @return mixed
     */
    public function registerUser(array $credentials);

    /**
     * Update a user.
     *
     * @param       $userId
     * @param array $credentials
     * @param array $data
     * @return mixed
     */
    public function updateUser($userId, array $credentials, array $data = []);

    /**
     * Change a user's password.
     *
     * @param $userId
     * @param $password
     * @return mixed
     */
    public function changeUserPassword($userId, $password);

    /**
     * Find a user by their login.
     *
     * @param $login
     * @return mixed
     */
    public function findUserByLogin($login);

    /**
     * Find a user by their login and password.
     *
     * @param $login
     * @param $password
     * @return mixed
     */
    public function findUserByLoginAndPassword($login, $password);

    /**
     * Find a user by their ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findUserById($userId);

    /**
     * Update the users last activity timestamp.
     *
     * @param $userId
     * @return mixed
     */
    public function updateLastActivity($userId);

    /**
     * Update the users last logged in timestamp.
     *
     * @param $userId
     * @return mixed
     */
    public function updateLastLoggedIn($userId);
}
 