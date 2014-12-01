<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\Foundation\Command\LogoutUserCommand;
use Anomaly\Streams\Addon\Module\Users\Ui\Form\UserForm;
use Anomaly\Streams\Addon\Module\Users\Ui\Table\UserTable;
use Anomaly\Streams\Addon\Module\Users\User\Command\ActivateUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\BlockUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\DeactivateUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Command\UnblockUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;
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
     * @param UserTable $table
     * @return string
     */
    public function index(UserTable $table)
    {
        return $table->render();
    }

    /**
     * Return the form UI for creating a new user.
     *
     * @param UserForm $form
     * @return mixed
     */
    public function create(UserForm $form)
    {
        return $form->render();
    }

    /**
     * Return the form UI for an existing user.
     *
     * @param UserForm   $form
     * @param            $id
     * @return mixed
     */
    public function edit(UserForm $form, $id)
    {
        return $form->render($id);
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
        $this->execute(new ActivateUserCommand($users->find($id)));

        return redirect(referer('admin/users'));
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
        $this->execute(new DeactivateUserCommand($users->find($id)));

        return redirect(referer('admin/users'));
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
        $this->execute(new BlockUserCommand($users->find($id)));

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
        $this->execute(new UnblockUserCommand($users->find($id)));

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
        $this->execute(new LogoutUserCommand($users->find($id)));

        return redirect(referer('admin/users'));
    }
}
 