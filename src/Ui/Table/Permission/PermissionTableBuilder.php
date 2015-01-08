<?php namespace Anomaly\UsersModule\Ui\Table\Permission;

use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class PermissionTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\Permission
 */
class PermissionTableBuilder extends TableBuilder
{

    /**
     * The table entries.
     *
     * Because we're not using a model
     * and it's a little more complicated
     * than just loading a simple collection
     * to the table, we'll use this handler to
     * return entries for the table to use.
     *
     * @var string
     */
    protected $entries = 'Anomaly\UsersModule\Ui\Table\Permission\Handle\EntriesHandler@handle';

    /**
     * The table columns.
     *
     * Again, this is a little complicated to put
     * in here. Instead let's define a handler and
     * let it return our columns based on Roles.
     *
     * @var string
     */
    protected $columns = 'Anomaly\UsersModule\Ui\Table\Permission\Handle\ColumnsHandler@handle';

    /**
     * The table actions. This returns a simple
     * array for now.
     *
     * @var string
     */
    protected $actions = 'Anomaly\UsersModule\Ui\Table\Permission\Handle\ActionsHandler@handle';

    /**
     * Create a new PermissionTableBuilder instance.
     *
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        $table->getOptions()->put('wrapper', 'module::admin/permissions/wrapper');

        parent::__construct($table);
    }
}
