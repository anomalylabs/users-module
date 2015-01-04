<?php namespace Anomaly\UsersModule\Ui\Table;

use Anomaly\UsersModule\Role\RoleModel;
use Anomaly\Streams\Platform\Ui\Table\Table;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class RoleTableBuilder extends TableBuilder
{

    function __construct(Table $table)
    {
        $this->setUpModel();
        $this->setUpFilters();
        $this->setUpColumns();
        $this->setUpButtons();

        parent::__construct($table);
    }

    protected function setUpModel()
    {
        $this->setModel(new RoleModel());
    }

    protected function setUpFilters()
    {
        $this->setFilters(
            [
                'name',
                'slug',
            ]
        );
    }

    protected function setUpColumns()
    {
        $this->setColumns(
            [
                'name',
                'slug',
                [
                    'header' => 'permissions',
                    'value'  => function ($entry) {
                            /*if ($entry->permissions) {

                                return implode('.', $entry->permissions);
                            }

                            if (!$entry->permissions) {
                                return 'No permissions';
                            }*/
                        },
                ],
            ]
        );
    }

    protected function setUpButtons()
    {
        $this->setButtons(
            [
                'edit',
            ]
        );
    }
}
