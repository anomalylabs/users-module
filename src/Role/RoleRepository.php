<?php namespace Anomaly\Streams\Addon\Module\Users\Role;

use Anomaly\Streams\Addon\Module\Users\Role\Contract\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{

    protected $model;

    function __construct(RoleModel $model)
    {
        $this->model = $model;
    }

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
 