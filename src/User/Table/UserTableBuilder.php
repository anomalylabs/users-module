<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class UserTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table
 */
class UserTableBuilder extends TableBuilder
{

    /**
     * The table actions.
     *
     * @var array
     */
    public $actions = [
        'delete'
    ];

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'username',
        'email',
        'roles',
        'activated',
        'enabled'
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'entry.edit_link' => [
            'sort_column' => 'display_name'
        ],
        'username',
        'email',
        'activated'       => 'entry.activated.label',
        'enabled'         => 'entry.enabled.label'
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'permissions' => [
            'button' => 'info',
            'icon'   => 'lock',
            'href'   => 'admin/users/permissions/{entry.id}'
        ]
    ];

}
