<?php namespace Anomaly\UsersModule\Permission\Table;

use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Http\Request;

/**
 * Class PermissionTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Permission\Table
 */
class PermissionTableBuilder extends TableBuilder
{

    /**
     * The entries handler.
     *
     * @var string
     */
    protected $entries = 'Anomaly\UsersModule\Permission\Table\Handler\EntriesHandler@handle';

    /**
     * The columns handler.
     *
     * @var string
     */
    protected $columns = 'Anomaly\UsersModule\Permission\Table\Handler\ColumnsHandler@handle';

    /**
     * The actions handler.
     *
     * @var string
     */
    protected $actions = 'Anomaly\UsersModule\Permission\Table\Handler\ActionsHandler@handle';

    /**
     * Create a new PermissionTableBuilder instance.
     *
     * @param Table   $table
     * @param Request $request
     */
    public function __construct(Table $table, Request $request)
    {
        $options = $table->getOptions();

        $options->put('role_id', $request->segment(4));

        parent::__construct($table);
    }
}
