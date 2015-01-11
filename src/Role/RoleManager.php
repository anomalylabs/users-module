<?php namespace Anomaly\UsersModule\Role;

use Illuminate\Foundation\Bus\DispatchesCommands;

class RoleManager
{

    use DispatchesCommands;

    public function create($role)
    {
        return $this->dispatchFromArray('Anomaly\UsersModule\Role\Command\CreateRole', $role);
    }
}
