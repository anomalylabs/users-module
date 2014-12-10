<?php namespace Anomaly\Streams\Addon\Module\Users\Role\Contract;

interface RoleRepositoryInterface
{

    public function create($name, $slug, $permissions);
}
 