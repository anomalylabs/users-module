<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class UserTable
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui
 */
class UserTable extends TableBuilder
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
        'edit' => [
            'text'       => 'Edit',
            'attributes' => [
                'href' => '/admin/users/edit/{{ entry.id }}',
            ]
        ],
    ];

    protected $actions = [];
}
 