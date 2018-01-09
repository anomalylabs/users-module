<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class UsersController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UsersController extends PublicController
{

    /**
     * View a user profile.
     *
     * @param  UserRepositoryInterface $users
     * @param                          $username
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(UserRepositoryInterface $users, $username)
    {
        if (!$user = $users->findByUsername($username)) {
            abort(404);
        }

        return $this->view->make('anomaly.module.users::users/view', compact('user'));
    }
}
