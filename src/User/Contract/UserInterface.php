<?php namespace Anomaly\UsersModule\User\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\EloquentCollection;
use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Interface UserInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Contract
 */
interface UserInterface extends EntryInterface
{

    /**
     * Get the email.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Get the username.
     *
     * @return string
     */
    public function getUsername();

    /**
     * Get the display name.
     *
     * @return string
     */
    public function getDisplayName();

    /**
     * Get the first name.
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Get the last name.
     *
     * @return string
     */
    public function getLastName();

    /**
     * Set the password.
     *
     * @param $password
     * @return $this
     */
    public function setPassword($password);

    /**
     * Get related roles.
     *
     * @return EntryCollection
     */
    public function getRoles();

    /**
     * Return whether a user is in a role.
     *
     * @param RoleInterface $role
     * @return bool
     */
    public function hasRole(RoleInterface $role);

    /**
     * Return whether a user is in
     * any of the provided roles.
     *
     * @param EloquentCollection $roles
     * @return bool
     */
    public function hasAnyRole(EloquentCollection $roles);

    /**
     * Return whether the user
     * is an admin or not.
     *
     * @return bool
     */
    public function isAdmin();

    /**
     * Get the permissions.
     *
     * @return array
     */
    public function getPermissions();

    /**
     * Return whether a user or it's roles has a permission.
     *
     * @param      $permission
     * @param bool $checkRoles
     * @return mixed
     */
    public function hasPermission($permission, $checkRoles = true);

    /**
     * Return whether a user has any of provided permission.
     *
     * @param $permissions
     * @return bool
     */
    public function hasAnyPermission(array $permissions);

    /**
     * Merge provided permissions onto existing ones.
     *
     * @param array $permissions
     * @return $this
     */
    public function mergePermissions(array $permissions);

    /**
     * Return the activated flag.
     *
     * @return bool
     */
    public function isActivated();

    /**
     * Return the enabled flag.
     *
     * @return bool
     */
    public function isEnabled();

    /**
     * Get the reset code.
     *
     * @return string
     */
    public function getResetCode();

    /**
     * Set the reset code.
     *
     * @param $code
     * @return $this
     */
    public function setResetCode($code);

    /**
     * Get the activation code.
     *
     * @return string
     */
    public function getActivationCode();

    /**
     * Set the activation code.
     *
     * @param $code
     * @return $this
     */
    public function setActivationCode($code);

    /**
     * Return the roles relationship.
     *
     * @return BelongsToMany
     */
    public function roles();

    /**
     * Return the full name.
     *
     * @return string
     */
    public function name();

    /**
     * Attach a role to the user.
     *
     * @param RoleInterface $role
     */
    public function attachRole(RoleInterface $role);
}
