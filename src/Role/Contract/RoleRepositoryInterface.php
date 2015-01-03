<?php namespace Anomaly\UsersModule\Role\Contract;

interface RoleRepositoryInterface
{

    public function create($name, $slug, $permissions);
}
 