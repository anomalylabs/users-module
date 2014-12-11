<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class UserTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui
 */
class UserTableBuilder extends TableBuilder
{

    protected $model = 'Anomaly\Streams\Addon\Module\Users\User\UserModel';

    protected $views = [
        'view_all' => [
            'test' => 'foo',
            'view' => 'all',
        ],
    ];

    protected $filters = [
        'username',
        'email',
    ];

    protected $columns = [
        'username',
        'email',
    ];

    protected $buttons = [
        'edit',
    ];

    protected $actions = [
        'test' => [
            'text' => 'Action',
            'type' => 'success',
        ]
    ];
}
 