<?php namespace Anomaly\Streams\Addon\Module\Users\Ui;

use Anomaly\Streams\Platform\Ui\Table\TableUi;
use Anomaly\Streams\Addon\Module\Users\User\UserModel;

class UserTableUi extends TableUi
{
    protected function boot()
    {
        $this->setUpModel();
        $this->setUpColumns();
        $this->setUpButtons();
        $this->setUpActions();
        $this->setUpOptions();
    }

    protected function setUpModel()
    {
        $this->setModel(new UserModel());
    }

    protected function setUpColumns()
    {
        $this->setColumns(
            [
                'first_name',
                'last_name',
                'email',
                'username',
                'last_login_at',
                'last_activity_at',
            ]
        );
    }

    protected function setUpButtons()
    {
        $this->setButtons(
            [
                [
                    'text' => 'Test Buttons',
                    'url'  => 'admin/login',
                ]
            ]
        );
    }

    protected function setUpActions()
    {
        $this->setActions(
            [
                [
                    'text' => 'misc.untitled',
                ]
            ]
        );
    }

    protected function setUpOptions()
    {
        $this->setSortable(true);
    }
}
 