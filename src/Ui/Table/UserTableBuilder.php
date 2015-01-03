<?php namespace Anomaly\UsersModule\Ui\Table;

use Anomaly\UsersModule\User\UserManager;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Ui\Table\Table;
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

    protected $model = 'Anomaly\UsersModule\User\UserModel';

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

    protected $actions = [
        'test' => [
            'text'     => 'Action',
            'type'     => 'success',
            'dropdown' => [
                [
                    'value' => 'test',
                    'text'  => 'Test Extra',
                ]
            ]
        ]
    ];

    public function __construct(Table $table)
    {
        $this->setButtons(
            [
                [
                    'button' => 'edit',
                    'text'   => function (EntryInterface $entry) {
                            return md5($entry);
                        },
                ],
            ]
        );

        $this->setColumns(
            [
                'username',
                [
                    'heading' => 'Test',
                    'value'   => function (EntryInterface $entry) {
                            return $entry->email . 'Test';
                        }
                ]
            ]
        );

        parent::__construct($table);
    }
}
 