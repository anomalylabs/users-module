<?php namespace Anomaly\UsersModule\Ui\Table\Permission\Handle;

use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Anomaly\UsersModule\Ui\Table\Permission\PermissionTableBuilder;
use Illuminate\Support\Collection;

/**
 * Class EntriesHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\Permission\Handle
 */
class EntriesHandler
{

    /**
     * Loaded modules.
     *
     * @var ModuleCollection
     */
    protected $modules;

    /**
     * Create a new EntriesHandler instance.
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
     * @return Collection
     */
    public function handle()
    {
        $permissions = new Collection();

        $this->loadAddonPermissions($this->modules, $permissions);

        return $permissions;
    }

    /**
     * Load all addon permissions.
     *
     * @param Collection $addons
     * @param Collection $permissions
     */
    protected function loadAddonPermissions(Collection $addons, Collection $permissions)
    {
        foreach ($addons as $addon) {
            $this->loadPermissions($addon, $permissions);
        }
    }

    /**
     * Load permissions from an addon.
     *
     * @param Addon      $addon
     * @param Collection $permissions
     */
    protected function loadPermissions(Addon $addon, Collection $permissions)
    {
        foreach (config($addon->getKey('permissions'), []) as $access) {

            $permission = new \stdClass();

            $permission->slug        = $addon->getKey($access);
            $permission->name        = trans($addon->getKey('permission.' . $access . '.name'));
            $permission->description = trans($addon->getKey('permission.' . $access . '.description'));

            $permissions->put($access, $permission);
        }
    }
}
