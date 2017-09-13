<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\User\Form\UserFormBuilder;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Permission\PermissionFormBuilder;
use Anomaly\UsersModule\User\Table\UserTableBuilder;
use Auth;

/**
 * Class UsersController
 *
 * This is the primary class for managing
 * users through the UI.
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UsersController extends AdminController
{

    /**
     * Return an index of existing users.
     *
     * @param  UserTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(UserTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the form for creating a new user.
     *
     * @param  UserFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(UserFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return the form for editing an existing user.
     *
     * @param  UserFormBuilder                            $form
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(UserFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Return the form for editing permissions.
     *
     * @param  PermissionFormBuilder                      $form
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function permissions(PermissionFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Login the admin user as a different user and redirect.
     *
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAs(UserRepositoryInterface $users, $id)
    {
        if(@Auth::user() && @Auth::user()->hasRole('admin'))
        {
            $user = $users->find($id);
            if ($user) {
                Auth::login($user);
                return redirect()->to('/');
            } else {
                return redirect()->back()->with('error',trans('anomaly.module.users::message.no_user_found'));
            }
        } else {
            return redirect()->back()->with('error',trans('anomaly.module.users::message.not_an_admin'));
        }
    }
}
