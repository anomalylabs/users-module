<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\Ui\UserFormUi;
use Anomaly\Streams\Addon\Module\Users\Ui\UserTableUi;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class UsersController
 *
 * This is the primary class for managing
 * users through the UI.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin
 */
class UsersController extends AdminController
{

    /**
     * Return the table UI for users.
     *
     * @param UserTableUi $ui
     * @return \Illuminate\View\View
     */
    public function index(UserTableUi $ui)
    {
        return $ui->make();
    }

    /**
     * Return the form UI for creating a new user.
     *
     * @param UserFormUi $ui
     * @return \Illuminate\View\View
     */
    public function create(UserFormUi $ui)
    {
        return $ui->make();
    }

    /**
     * Return the form UI for an existing user.
     *
     * @param UserFormUi $ui
     * @param            $id
     * @return \Illuminate\View\View
     */
    public function edit(UserFormUi $ui, $id)
    {
        return $ui->make($id);
    }
}
 