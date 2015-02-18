<?php namespace Anomaly\UsersModule\Role;

use Anomaly\UsersModule\Role\Contract\RoleInterface;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class RoleRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role
 */
class RoleRepository implements RoleRepositoryInterface
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
     * Create a new Role.
     *
     * @param $name
     * @param $slug
     * @return RoleInterface
     */
    public function create($name, $slug)
    {
        $role = $this->model->newInstance();

        $role->name = $name;
        $role->slug = $slug;

        $role->save();

        return $role;
    }

    /**
     * Find a role by it's ID.
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|RoleInterface
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find a role by it's slug.
     *
     * @param $slug
     * @return \Illuminate\Support\Collection|null|RoleInterface
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Update permissions for a role.
     *
     * @param       $id
     * @param array $permissions
     * @return RoleInterface|Collection|null
     */
    public function updatePermissions($id, array $permissions)
    {
        $role = $this->find($id);

        $role->permissions = $permissions;

        $role->save();

        return $role;
    }
}
