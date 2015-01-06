<?php namespace Anomaly\UsersModule\Role;

use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;

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
     * @return mixed
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
     * @param $permissions
     * @return mixed
     */
    public function create($name, $slug, $permissions)
    {
        $role = $this->model->newInstance();

        $role->name        = $name;
        $role->slug        = $slug;
        $role->permissions = $permissions;

        $role->save();

        return $role;
    }
}
