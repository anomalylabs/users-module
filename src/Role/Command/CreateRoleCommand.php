<?php namespace Anomaly\Streams\Addon\Module\Users\Role\Command;

/**
 * Class CreateRoleCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Role\Command
 */
class CreateRoleCommand
{

    /**
     * The role name.
     *
     * @var
     */
    protected $name;

    /**
     * The role slug.
     *
     * @var
     */
    protected $slug;

    /**
     * The role permissions.
     *
     * @var array
     */
    protected $permissions;

    /**
     * Create a new CreateRoleCommand instance.
     *
     * @param       $name
     * @param       $slug
     * @param array $permissions
     */
    function __construct($name, $slug, array $permissions)
    {
        $this->name        = $name;
        $this->slug        = $slug;
        $this->permissions = $permissions;
    }

    /**
     * Get the permissions.
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Get the name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the slug.
     *
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
 