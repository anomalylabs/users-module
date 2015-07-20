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
     * The table views.
     *
     * @var array
     */
    protected $views = [
        'all'       => [
            'columns' => [
                'display_name',
                'username',
                'email',
                'anomaly.module.users::field.status.name' => 'Anomaly\UsersModule\User\Table\Column\StatusColumn'
            ],
            'buttons' => [
                'permissions' => [
                    'button' => 'info',
                    'icon'   => 'unlock',
                    'href'   => 'admin/users/permissions/{entry.id}'
                ],
                'edit'
            ],
            'actions' => [
                'delete',
                'suspend' => [
                    'icon'         => 'ban',
                    'button'       => 'confirm',
                    'data-message' => 'anomaly.module.users::message.suspend_users_confirm'
                ]
            ]
        ],
        'online'    => [
            'columns' => [
                'display_name',
                'username',
                'email',
                'entry.last_activity_at.time_ago'
            ]
        ],
        'inactive'  => [
            'actions' => [
                'delete',
                'activate' => [
                    'button' => 'success'
                ]
            ]
        ],
        'suspended' => [
            'actions' => [
                'delete',
                'reinstate' => [
                    'button'       => 'confirm',
                    'type'         => 'success',
                    'data-message' => 'anomaly.module.users::message.reinstate_users_confirm'
                ]
            ]
        ]
    ];

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'username',
        'email',
        'roles'
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'display_name',
        'username',
        'email'
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit'
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    public $actions = [
        'delete'
    ];

}
