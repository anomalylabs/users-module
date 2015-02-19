<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\Authenticator\Authenticator;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Form\UserFormBuilder;
use Anomaly\UsersModule\User\Table\UserTableBuilder;
use Anomaly\UsersModule\User\UserActivator;
use Anomaly\UsersModule\User\UserBlocker;
use Anomaly\UsersModule\User\UserManager;

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
     * The user repository.
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * The message bag.
     *
     * @var MessageBag
     */
    protected $messages;

    /**
     * Create a new UsersController instance.
     *
     * @param UserRepositoryInterface $users
     */
    public function __construct(UserRepositoryInterface $users)
    {
        parent::__construct();

        $this->users = $users;
    }

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
     * @param UserManager $manager
     * @param             $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(UserManager $manager, $id)
    {
        $manager->delete($this->users->find($id));

        return redirect('admin/users');
    }

    /**
     * Activate a user.
     *
     * @param UserActivator $activator
     * @param               $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(UserActivator $activator, $id)
    {
        $activator->force($this->users->find($id));

        return redirect('admin/users');
    }

    /**
     * Deactivate a user.
     *
     * @param UserActivator $activator
     * @param               $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deactivate(UserActivator $activator, $id)
    {
        $activator->deactivate($this->users->find($id));

        return redirect('admin/users');
    }

    /**
     * Block a user.
     *
     * @param UserBlocker $blocker
     * @param             $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function block(UserBlocker $blocker, $id)
    {
        $blocker->block($this->users->find($id));

        return redirect('admin/users/logout/' . $id);
    }

    /**
     * Unblock a user.
     *
     * @param UserBlocker $blocker
     * @param             $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function unblock(UserBlocker $blocker, $id)
    {
        $blocker->unblock($this->users->find($id));

        return redirect('admin/users');
    }

    /**
     * Log a user out.
     *
     * @param UserRepository          $users
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Authenticator $authenticator, $id)
    {
        $authenticator->logout($this->users->find($id));

        return redirect('admin/users');
    }
}
