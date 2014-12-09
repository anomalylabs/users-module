<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Table;

use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class PermissionTableBuilder extends TableBuilder
{

    protected $actions = [
        [
            'text' => 'Save',
            'slug' => 'save',
        ],
    ];

    protected $views = [
        [
            'text' => 'Modules',
            'slug' => 'modules',
        ],
        [
            'text' => 'Themes',
            'slug' => 'themes',
        ],
        [
            'text' => 'Blocks',
            'slug' => 'blocks',
        ],
        [
            'text' => 'Tags',
            'slug' => 'tags',
        ],
        [
            'text' => 'Extensions',
            'slug' => 'extensions',
        ],
    ];

    function __construct(Table $table)
    {
        $table->setEntries(app('streams.modules'));

        $this->setColumns(
            [
                [
                    'header' => 'Addon',
                    'value'  => function ($entry) {

                            return trans($entry->getName());
                        }
                ],
                [
                    'header' => 'Admin',
                    'class'  => 'text-center',
                    'value'  => function ($entry) {

                            return app('form')->checkbox('permission[]', $value = 1, $checked = null);
                        }
                ]
            ]
        );

        parent::__construct($table);
    }
}
 