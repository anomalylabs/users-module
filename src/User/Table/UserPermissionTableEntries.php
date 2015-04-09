<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Illuminate\Support\Collection;

/**
 * Class UserPermissionTableEntries
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table
 */
class UserPermissionTableEntries
{

    /**
     * The module collection.
     *
     * @var ModuleCollection
     */
    protected $modules;

    /**
     * Create a new UserPermissionTableEntries instance.
     *
     * @param ModuleCollection $modules
     */
    public function __construct(ModuleCollection $modules)
    {
        $this->modules = $modules;
    }

    /**
     * Return the table entries.
     *
     * @param UserPermissionTableBuilder $builder
     */
    public function handle(UserPermissionTableBuilder $builder)
    {
        $entries = new Collection();

        $this->loadPermissions($entries, 'modules');

        $builder->setTableEntries($entries);
    }

    /**
     * Load permissions for an addon collection.
     *
     * @param Collection $entries
     * @param            $collection
     */
    protected function loadPermissions(Collection $entries, $collection)
    {
        foreach ($this->{$collection} as $addon) {
            $this->loadAddon($entries, $addon);
        }
    }

    /**
     * Load an addon that has permissions.
     *
     * @param Collection $entries
     * @param Addon      $addon
     */
    protected function loadAddon(Collection $entries, Addon $addon)
    {
        if (config($addon->getNamespace('permissions'))) {
            $entries->push($addon);
        }
    }
}
