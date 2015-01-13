<?php namespace Anomaly\UsersModule\Role\Ui\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class RoleTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Ui\Table
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
    protected $columns = 'Anomaly\UsersModule\Role\Ui\Table\Handler\ColumnsHandler@handle';

    /**
     * The table buttons.
     *
     * @var string
     */
    protected $buttons = 'Anomaly\UsersModule\Role\Ui\Table\Handler\ButtonsHandler@handle';

    /**
     * The table actions.
     *
     * @var string
     */
    protected $actions = 'Anomaly\UsersModule\Role\Ui\Table\Handler\ActionsHandler@handle';

}
