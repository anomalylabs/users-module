<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\Ui\Form\UserForm;
use Anomaly\Streams\Addon\Module\Users\Ui\Table\UserTable;
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
     * @param UserTable $ui
     * @return string
     */
    public function index(UserTable $ui)
    {
        return $ui->render();
    }

    /**
     * Return the form UI for creating a new user.
     *
     * @param UserForm $ui
     * @return mixed
     */
    public function create(UserForm $ui)
    {
        return $ui->render();
    }

    /**
     * Return the form UI for an existing user.
     *
     * @param UserForm $ui
     * @param            $id
     * @return mixed
     */
    public function edit(UserForm $ui, $id)
    {
        return $ui->render($id);
    }
}
 