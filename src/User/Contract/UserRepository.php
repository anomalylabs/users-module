<?php namespace Anomaly\UsersModule\User\Contract;

use Anomaly\UsersModule\Role\Contract\Role;

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
     * @param array $credentials
     * @return User
     */
    public function create(array $credentials);

    /**
     * Delete a user.
     *
     * @param User $user
     * @return User
     */
    public function delete(User $user);

    /**
     * Activate a user.
     *
     * @param User $user
     * @return User
     */
    public function activate(User $user);

    /**
     * Deactivate a user.
     *
     * @param User $user
     * @return User
     */
    public function deactivate(User $user);

    /**
     * Block a user.
     *
     * @param User $user
     * @return User
     */
    public function block(User $user);

    /**
     * Unblock a user.
     *
     * @param User $user
     * @return User
     */
    public function unblock(User $user);

    /**
     * Find a user.
     *
     * @param $id
     * @return null|User
     */
    public function find($id);

    /**
     * Find a user by their username.
     *
     * @param $username
     * @return null|User
     */
    public function findUserByUsername($username);

    /**
     * Find a user by their credentials.
     *
     * @param array $credentials
     * @return null|User
     */
    public function findByCredentials(array $credentials);

    /**
     * Attach a role to a user.
     *
     * @param User $user
     * @param Role $role
     * @return User
     */
    public function attachRole(User $user, Role $role);
}
