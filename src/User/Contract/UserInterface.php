<?php namespace Anomaly\UsersModule\User\Contract;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Interface UserInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Contract
 */
interface UserInterface
{

    /**
     * Return the roles relationship.
     *
     * @return BelongsToMany
     */
    public function roles();

    /**
     * Get the user's ID.
     *
     * @return int
     */
    public function getId();

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
     * Get the activated flag.
     *
     * @return bool
     */
    public function isActivated();

    /**
     * Get the blocked flag.
     *
     * @return bool
     */
    public function isBlocked();

    /**
     * Get related roles.
     *
     * @return EntryCollection
     */
    public function getRoles();

    /**
     * Return whether a user is in a role.
     *
     * @param string|array $role
     * @return bool
     */
    public function hasRole($role);

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
     * @param $string
     * @return bool
     */
    public function hasAnyPermission(array $string);
}
