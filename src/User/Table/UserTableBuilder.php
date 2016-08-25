<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\UsersModule\User\Table\Filter\StatusFilterQuery;

/**
 * Class UserTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UserTableBuilder extends TableBuilder
{

    /**
     * The table actions.
     *
     * @var array
     */
    public $actions = [
        'delete',
    ];

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'search' => [
            'filter' => 'search',
            'fields' => [
                'display_name',
                'username',
                'email',
            ],
        ],
        'roles',
        'status' => [
            'filter'  => 'select',
            'query'   => StatusFilterQuery::class,
            'options' => [
                'active'   => 'anomaly.module.users::field.status.option.active',
                'inactive' => 'anomaly.module.users::field.status.option.inactive',
                'disabled' => 'anomaly.module.users::field.status.option.disabled',
            ],
        ],
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'display_name',
        'username',
        'email',
        'status' => [
            'value' => 'entry.status_label',
        ],
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
        'permissions' => [
            'button' => 'info',
            'icon'   => 'lock',
            'href'   => 'admin/users/permissions/{entry.id}',
        ],
    ];

}
