<?php namespace Anomaly\UsersModule\Ui\Table\Role;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class RoleTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\Role
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
     * The table filters.
     *
     * @var array
     */
    protected $filters = 'Anomaly\UsersModule\Ui\Table\Role\Handler\FilterHandler@handle';

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = 'Anomaly\UsersModule\Ui\Table\Role\Handler\ColumnHandler@handle';
}
