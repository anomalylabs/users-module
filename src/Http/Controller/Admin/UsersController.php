<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Form\UserFormBuilder;
use Anomaly\UsersModule\User\Table\UserTableBuilder;

/**
 * Class UsersController
 *
 * This is the primary class for managing
 * users through the UI.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller\Admin
 */
class UsersController extends AdminController
{

    /**
     * Return the table UI for users.
     *
     * @param UserTableBuilder $table
     * @return string
     */
    public function index(UserTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the form UI for creating a new user.
     *
     * @param UserFormBuilder $form
     * @return mixed
     */
    public function create(UserFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return the form UI for an existing user.
     *
     * @param UserFormBuilder $form
     * @param                 $id
     * @return mixed
     */
    public function edit(UserFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Delete a user and redirect back.
     *
     * @param UserRepositoryInterface $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(UserRepositoryInterface $users, $id)
    {
        $users->delete($id);

        return redirect()->back();
    }

    /**
     * Activate a user.
     *
     * @param UserRepositoryInterface $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function activate(UserRepositoryInterface $users, $id)
    {
        return redirect()->back();
    }

    /**
     * Deactivate a user.
     *
     * @param UserRepositoryInterface $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deactivate(UserRepositoryInterface $users, $id)
    {
        return redirect()->back();
    }

    /**
     * Block a user.
     *
     * @param UserRepositoryInterface $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function block(UserRepositoryInterface $users, $id)
    {
        return redirect(referer('admin/users'));
    }

    /**
     * Unblock a user.
     *
     * @param UserRepositoryInterface $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function unblock(UserRepositoryInterface $users, $id)
    {
        return redirect(referer('admin/users'));
    }

    /**
     * Log a user out.
     *
     * @param UserRepositoryInterface $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(UserRepositoryInterface $users, $id)
    {
        return redirect(referer('admin/users'));
    }
}
