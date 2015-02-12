<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class UserTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui
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
     * The table's views.
     *
     * @var array
     */
    protected $views = [
        'all',
        'recently_created'
    ];

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'username',
        'email',
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'username',
        'email',
    ];

}
