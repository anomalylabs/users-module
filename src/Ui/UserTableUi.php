<?php namespace Anomaly\Streams\Addon\Module\Users\Ui;

use Anomaly\Streams\Platform\Ui\Table\TableUi;
use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class UserTableUi extends TableUi
{
    protected function boot()
    {
        $this->setUpModel();
        $this->setUpViews();
        $this->setUpFilters();
        $this->setUpColumns();
        $this->setUpButtons();
        $this->setUpActions();
        $this->setUpOptions();
    }

    protected function setUpModel()
    {
        $this->setModel(new UserModel());
    }

    protected function setUpViews()
    {
        $this->setViews(
            [
                [
                    'title'   => 'Test View',
                    'slug'    => 'foo',
                    'handler' => 'Anomaly\Streams\Platform\Ui\Table\TableView',
                ],
                [
                    'title'   => 'Inactive',
                    'slug'    => 'bar',
                    'handler' => function ($query) {
                            return $query->whereUsername('admin');
                        },
                ]
            ]
        );
    }

    protected function setUpFilters()
    {
        $this->setFilters(
            [
                'first_name',
                'email',
            ]
        );
    }

    protected function setUpColumns()
    {
        $this->setColumns(
            [
                [
                    'heading' => 'Name',
                    'value'   => '{first_name} {last_name}',
                ],
                'username',
                'email.link',
                'last_login_at.valueAndDiffForHumans',
            ]
        );
    }

    protected function setUpButtons()
    {
        $this->setButtons(
            [
                'view',
                'edit',
            ]
        );
    }

    protected function setUpActions()
    {
        $this->setActions(
            [
                [
                    'type'    => 'delete',
                    'slug'    => 'delete',
                    'handler' => 'Anomaly\Streams\Platform\Ui\Table\TableAction',
                ],
            ]
        );
    }

    protected function setUpOptions()
    {
        $this->setSortable(true);
    }
}
 