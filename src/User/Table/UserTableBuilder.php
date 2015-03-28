<?php namespace Anomaly\UsersModule\User\Table;

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
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'username',
        'email',
    ];

    /**
     * The table views.
     *
     * @var array
     */
    protected $views = [
        'all',
        'recently_created',
        'blocked'       => [
            'text' => 'Blocked'
        ],
        'not_activated' => [
            'text' => 'Not Activated'
        ]
    ];

}
