<?php namespace Anomaly\UsersModule\Role\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\UsersModule\Role\Contract\RoleInterface;

/**
 * Class RolePermissionTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table
 */
class RolePermissionTableBuilder extends TableBuilder
{

    /**
     * The role instance.
     *
     * @var null|RoleInterface
     */
    protected $role = null;

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'save' => [
            'button'  => 'save',
            'toggle'  => false,
            'handler' => 'Anomaly\UsersModule\Role\Table\Action\SavePermissions@handle'
        ]
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        [
            'heading' => 'streams::addon.addon',
            'view'    => 'module::admin/permissions/addon'
        ],
        [
            'heading' => 'module::field.permissions.name',
            'view'    => 'module::admin/permissions/permissions'
        ]
    ];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [
        'scripts.js' => 'module::js/permissions.js'
    ];

    /**
     * The options array.
     *
     * @var array
     */
    protected $options = [
        'breadcrumb' => 'Permissions',
        'class'      => 'table striped align-top',
        'permission' => 'anomaly.module.users::roles.permissions'
    ];

    /**
     * Get the role.
     *
     * @return RoleInterface|null
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the role.
     *
     * @param RoleInterface $role
     * @return $this
     */
    public function setRole(RoleInterface $role)
    {
        $this->role = $role;

        $this->setOption('subject', $role);

        return $this;
    }
}
