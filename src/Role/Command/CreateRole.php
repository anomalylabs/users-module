<?php namespace Anomaly\UsersModule\Role\Command;

class CreateRole
{

    protected $name;

    protected $slug;

    protected $permissions;

    function __construct($name, $slug, array $permissions = [])
    {
        $this->name        = $name;
        $this->slug        = $slug;
        $this->permissions = $permissions;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function getSlug()
    {
        return $this->slug;
    }
}
