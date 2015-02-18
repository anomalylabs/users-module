<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\User\Contract\UserRepository;
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
     * Return an index of existing users.
     *
     * @param UserTableBuilder $table
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index(UserTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a form for a new user.
     *
     * @param UserFormBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function create(UserFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for an existing user.
     *
     * @param UserFormBuilder $form
     * @param                 $id
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(UserFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Delete a user.
     *
     * @param UserRepository          $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(UserRepository $users, $id)
    {
        $user = $users->find($id);

        $users->delete($user);

        return redirect()->back();
    }

    /**
     * Activate a user.
     *
     * @param UserRepository          $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function activate(UserRepository $users, $id)
    {
        $user = $users->find($id);

        $users->activate($user);

        return redirect()->back();
    }

    /**
     * Deactivate a user.
     *
     * @param UserRepository          $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deactivate(UserRepository $users, $id)
    {
        return redirect()->back();
    }

    /**
     * Block a user.
     *
     * @param UserRepository          $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function block(UserRepository $users, $id)
    {
        return redirect()->back();
    }

    /**
     * Unblock a user.
     *
     * @param UserRepository          $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function unblock(UserRepository $users, $id)
    {
        return redirect()->back();
    }

    /**
     * Log a user out.
     *
     * @param UserRepository          $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(UserRepository $users, $id)
    {
        return redirect()->back();
    }
}
