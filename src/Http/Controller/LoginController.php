<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\UserAuthenticator;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

/**
 * Class LoginController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller
 */
class LoginController extends PublicController
{

    /**
     * Return the login view.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function login()
    {
        return $this->view->make('anomaly.module.users::login');
    }

    /**
     * Logout the active user.
     *
     * @param SettingRepositoryInterface $settings
     * @param UserAuthenticator          $authenticator
     * @param Guard                      $auth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(SettingRepositoryInterface $settings, UserAuthenticator $authenticator, Guard $auth)
    {
        if (!$auth->guest()) {
            $authenticator->logout();
        }

        if (filter_var(
            $message = $settings->value(
                'anomaly.module.users::logout_message',
                'anomaly.module.users::message.logged_out'
            )
        )) {
            $this->messages->success($message);
        }

        return $this->response->redirectTo(
            $this->request->get('redirect', $settings->value('anomaly.module.users::logout_redirect', '/'))
        );
    }
}
