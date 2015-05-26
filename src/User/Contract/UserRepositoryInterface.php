<?php namespace Anomaly\UsersModule\User\Contract;

use Anomaly\UsersModule\Role\Contract\RoleInterface;

/**
 * Interface UserRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Contract
 */
interface UserRepositoryInterface
{

    /**
     * Create a new user.
     *
     * @param array $credentials
     * @return UserInterface
     */
    public function create(array $credentials);

    /**
     * Delete a user.
     *
     * @param UserInterface $user
     * @return UserInterface
     */
    public function delete(UserInterface $user);

    /**
     * Activate a user.
     *
     * @param UserInterface $user
     * @return UserInterface
     */
    public function activate(UserInterface $user);

    /**
     * Deactivate a user.
     *
     * @param UserInterface $user
     * @return UserInterface
     */
    public function deactivate(UserInterface $user);

    /**
     * Block a user.
     *
     * @param UserInterface $user
     * @return UserInterface
     */
    public function block(UserInterface $user);

    /**
     * Unblock a user.
     *
     * @param UserInterface $user
     * @return UserInterface
     */
    public function unblock(UserInterface $user);

    /**
     * Find a user.
     *
     * @param $id
     * @return null|UserInterface
     */
    public function find($id);

    /**
     * Find a user by their username.
     *
     * @param $username
     * @return null|UserInterface
     */
    public function findUserByUsername($username);

    /**
     * Find a user by their credentials.
     *
     * @param array $credentials
     * @return null|UserInterface
     */
    public function findByCredentials(array $credentials);

    /**
     * Attach a role to a user.
     *
     * @param UserInterface $user
     * @param RoleInterface $role
     * @return UserInterface
     */
    public function attachRole(UserInterface $user, RoleInterface $role);

    /**
     * Update permissions for a user.
     *
     * @param UserInterface $user
     * @param array         $permissions
     * @return UserInterface
     */
    public function updatePermissions(UserInterface $user, array $permissions);

    /**
     * Touch a user's last activity and IP.
     *
     * @param UserInterface $user
     */
    public function touchLastActivity(UserInterface $user);

    /**
     * Touch a user's last login.
     *
     * @param UserInterface $user
     */
    public function touchLastLogin(UserInterface $user);
}
