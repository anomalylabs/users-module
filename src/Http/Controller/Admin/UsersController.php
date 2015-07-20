<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Form\UserFormBuilder;
use Anomaly\UsersModule\User\Table\UserPermissionTableBuilder;
use Anomaly\UsersModule\User\Table\UserTableBuilder;
use Anomaly\UsersModule\User\UserActivator;
use Anomaly\UsersModule\User\UserBlocker;
use Anomaly\UsersModule\User\UserManager;
use Illuminate\Routing\Redirector;

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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(UserTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the form for creating a new user.
     *
     * @param UserFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(UserFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return the form for editing an existing user.
     *
     * @param UserFormBuilder $form
     * @param                 $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(UserFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Return the form for editing permissions.
     *
     * @param UserRepositoryInterface $users
     * @param MessageBag              $messages
     * @param Redirector              $redirect
     * @param                         $id
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function permissions(UserRepositoryInterface $users, MessageBag $messages, Redirector $redirect, $id)
    {
        $user = $users->find($id);

        if ($user->hasRole('admin')) {

            $messages->warning('anomaly.module.users::message.modify_admin_user_warning');

            return $redirect->back();
        }

        return 'Permissions';
    }
}
