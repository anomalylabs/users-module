<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class LoginController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class LoginController extends PublicController
{

    /**
     * Return the login form.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        $this->template->set(
            'meta_title',
            'anomaly.module.users::breadcrumb.login'
        );

        return $this->view->make('anomaly.module.users::login');
    }

    /**
     * Logout the active user.
     *
     * @param  UserAuthenticator $authenticator
     * @param  Guard             $auth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(UserAuthenticator $authenticator, Guard $auth)
    {
        if (!$auth->guest()) {
            $authenticator->logout();
        }

        $this->messages->success($this->request->get('message', 'anomaly.module.users::message.logged_out'));

        return $this->response->redirectTo($this->request->get('redirect', '/'));
    }
}
