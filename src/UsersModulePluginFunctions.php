<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;

/**
 * Class UsersModulePluginFunctions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule
 */
class UsersModulePluginFunctions
{

    /**
     * The role repository.
     *
     * @var RoleRepositoryInterface
     */
    protected $roles;

    /**
     * Create a new UsersModulePluginFunctions instance.
     *
     * @param RoleRepositoryInterface $roles
     */
    public function __construct(RoleRepositoryInterface $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Return the available roles.
     *
     * @return EntryCollection
     */
    public function roles()
    {
        return $this->roles->all();
    }
}
