<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Auth\Guard;

/**
 * Class LoginController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\Http\Controller
 */
class LoginController extends PublicController
{

    /**
     * Logout the active user.
     *
     * @param UserAuthenticator $authenticator
     * @param Guard             $auth
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
