<?php namespace Anomaly\UsersModule\User\Contract;

/**
 * Interface UserRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Contract
 */
interface UserRepository
{

    /**
     * Create a new user.
     *
     * @param $username
     * @param $email
     * @param $password
     * @return User
     */
    public function create($username, $email, $password);

    /**
     * Delete a user.
     *
     * @param User $user
     * @return bool
     */
    public function delete($id);

    /**
     * Activate a user.
     *
     * @param $id
     * @return mixed
     */
    public function activate($id);

    /**
     * Block a user.
     *
     * @param $id
     * @return mixed
     */
    public function block($id);

    /**
     * Find a user.
     *
     * @param $id
     * @return null|User
     */
    public function find($id);

    /**
     * Find a user by their credentials.
     *
     * @param array $credentials
     * @return null|User
     */
    public function findByCredentials(array $credentials);
}
