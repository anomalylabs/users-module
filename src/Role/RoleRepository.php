<?php namespace Anomaly\UsersModule\Role;

use Anomaly\UsersModule\Role\Contract\Role;
use Illuminate\Support\Collection;

/**
 * Class RoleRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role
 */
class RoleRepository implements \Anomaly\UsersModule\Role\Contract\RoleRepository
{

    /**
     * The role model.
     *
     * @var RoleModel
     */
    protected $model;

    /**
     * Create a new RoleRepository instance.
     *
     * @param RoleModel $model
     */
    function __construct(RoleModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return all roles.
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Create a new role.
     *
     * @param array $attributes
     * @return Role
     */
    public function create(array $attributes)
    {
        $role = $this->model->newInstance();

        $role->name = $attributes['name'];
        $role->slug = $attributes['slug'];

        $role->permissions = array_get($attributes, 'permissions');

        $role->save();

        return $role;
    }

    /**
     * Delete a role.
     *
     * @param Role $role
     * @return Role
     */
    public function delete(Role $role)
    {
        $role->delete();

        return $role;
    }

    /**
     * Find a role.
     *
     * @param $id
     * @return null|Role
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find a role by it's slug.
     *
     * @param $slug
     * @return null|Role
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Update permissions for a role.
     *
     * @param Role  $role
     * @param array $permissions
     * @return Role
     */
    public function updatePermissions(Role $role, array $permissions)
    {
        $role->permissions = $permissions;

        $role->save();

        return $role;
    }
}
