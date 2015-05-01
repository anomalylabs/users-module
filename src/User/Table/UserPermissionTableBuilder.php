<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class UserPermissionTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table
 */
class UserPermissionTableBuilder extends TableBuilder
{

    /**
     * The user instance.
     *
     * @var null|UserInterface
     */
    protected $user = null;

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'save' => [
            'button'  => 'save',
            'toggle'  => false,
            'handler' => 'Anomaly\UsersModule\User\Table\Action\SavePermissions@handle'
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
     * Get the user.
     *
     * @return UserInterface|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the user.
     *
     * @param UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        $this->setOption('subject', $user);

        return $this;
    }
}
