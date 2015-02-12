<?php namespace Anomaly\UsersModule\Role\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class RoleTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Table
 */
class RoleTableBuilder extends TableBuilder
{

    /**
     * The table model.
     *
     * @var string
     */
    protected $model = 'Anomaly\UsersModule\Role\RoleModel';

    /**
     * The table columns.
     *
     * @var string
     */
    protected $columns = [
        'name',
        'slug',
    ];

    /**
     * The table actions.
     *
     * @var string
     */
    protected $actions = [
        'delete' => [
            'permission' => 'anomaly.module.users::permission.delete_user',
        ]
    ];

}
