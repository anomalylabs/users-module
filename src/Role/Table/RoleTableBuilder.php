<?php namespace Anomaly\UsersModule\Role\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class RoleTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\RoleInterface\Table
 */
class RoleTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'title',
                'slug',
                'description'
            ]
        ]
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'name',
        'description'
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
            'href'   => 'admin/users/roles/permissions/{entry.id}'
        ]
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete'
    ];

}
