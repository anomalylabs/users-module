<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\Streams\Platform\Ui\Table\Table;
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
     * The table model.
     *
     * @var string
     */
    protected $model = 'Anomaly\UsersModule\User\UserModel';

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'username',
        'email',
    ];

    protected $views = [
        'all',
        'recently_created'
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
     * Create a new UserTableBuilder instance.
     *
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        $table->setOption('eager', ['roles']);

        parent::__construct($table);
    }
}
