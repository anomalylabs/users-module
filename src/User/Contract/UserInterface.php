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
     * Return whether a user has a permission.
     *
     * @param string|array $permission
     * @return bool
     */
    public function hasPermission($permission);

    /**
     * Return whether a user has any of provided permission.
     *
     * @param $string
     * @return bool
     */
    public function hasAnyPermission(array $string);
}
