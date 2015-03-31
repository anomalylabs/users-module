<?php namespace Anomaly\UsersModule\Role\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class RoleTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\RoleInterface\Table
 */
class RoleTableBuilder extends TableBuilder
{

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'slug'
    ];

}
