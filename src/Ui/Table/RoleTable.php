<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Table;

use Anomaly\Streams\Platform\Model\Users\UsersRolesEntryModel;
use Anomaly\Streams\Platform\Ui\Table\Table;

class RoleTable extends Table
{

    /**
     * Set up the table class.
     */
    protected function boot()
    {
        $this->setUpModel();
        $this->setUpViews();
        $this->setUpFilters();
        $this->setUpColumns();
        $this->setUpButtons();
        $this->setUpActions();
    }

    protected function setUpModel()
    {
        $this->setModel(new UsersRolesEntryModel());
    }

    protected function setUpViews()
    {
        /*$this->setViews(
            [
                'edit',
            ]
        );*/
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
                'permissions',
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

    protected function setUpActions()
    {
        /*$this->setActions(
            [
                'delete',
            ]
        );*/
    }
}
 