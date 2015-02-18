<?php namespace Anomaly\UsersModule;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\UsersModule\Role\Contract\RoleRepository;

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
     * @var RoleRepository
     */
    protected $roles;

    /**
     * Create a new UsersModulePluginFunctions instance.
     *
     * @param RoleRepository $roles
     */
    public function __construct(RoleRepository $roles)
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
