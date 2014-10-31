<?php namespace Anomaly\Streams\Addon\Module\Users\Ui;

use Anomaly\Streams\Addon\Module\Users\User\UserModel;
use Anomaly\Streams\Platform\Ui\Table\TableUi;

/**
 * Class UserTableUi
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui
 */
class UserTableUi extends TableUi
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
        $this->setUpOptions();
    }

    /**
     * Set up the model.
     */
    protected function setUpModel()
    {
        $this->setModel(new UserModel());
    }

    /**
     * Set up the table views.
     */
    protected function setUpViews()
    {
        $this->setViews(
            [
                'all',
                'latest',
                'newest',
                'recently_created',
                'recently_modified',
            ]
        );
    }

    /**
     * Set up the table filters.
     */
    protected function setUpFilters()
    {
        $this->setFilters(
            [
                'first_name',
                'email',
            ]
        );
    }

    /**
     * Set up the table columns.
     */
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

    /**
     *
     */
    protected function setUpButtons()
    {
        $this->setButtons(
            [
                'view',
                'edit',
            ]
        );
    }

    /**
     * Set up the table actions.
     */
    protected function setUpActions()
    {
        $this->setActions(
            [
                [
                    'type'    => 'danger',
                    'slug'    => 'block',
                    'title'   => 'module.users::button.block',
                    'handler' => 'Anomaly\Streams\Addon\Module\Users\Ui\Table\Action\BlockUsersTableAction',
                ],
                [
                    'type'    => 'danger',
                    'slug'    => 'deactivate',
                    'title'   => 'module.users::button.deactivate',
                    'handler' => 'Anomaly\Streams\Addon\Module\Users\Ui\Table\Action\DeactivateUsersTableAction',
                ],
                [
                    'type'    => 'success',
                    'slug'    => 'activate',
                    'title'   => 'module.users::button.activate',
                    'handler' => 'Anomaly\Streams\Addon\Module\Users\Ui\Table\Action\ActivateUsersTableAction',
                ],
            ]
        );
    }

    /**
     * Set up the table options.
     */
    protected function setUpOptions()
    {
        $this->setSortable(true);
    }
}
 