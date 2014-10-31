<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\Authentication\AuthenticationService;
use Anomaly\Streams\Addon\Module\Users\Authentication\Exception\EmailOrUsernameRequiredException;
use Anomaly\Streams\Addon\Module\Users\Authentication\Exception\PasswordRequiredException;
use Anomaly\Streams\Addon\Module\Users\Authorization\AuthorizationService;
use Anomaly\Streams\Addon\Module\Users\Exception\UserNotFoundException;
use Anomaly\Streams\Addon\Module\Users\Session\SessionService;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class LoginController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin
 */
class LoginController extends AdminController
{

    /**
     * Show the login screen.
     *
     * @param AuthorizationService $authorization
     * @return \Illuminate\Http\RedirectResponse|Redirector|\Illuminate\View\View
     */
    public function login(AuthorizationService $authorization)
    {
        /**
         * If the user is already logged in
         * then send them to their home page.
         */
        if ($authorization->check()) {

            return redirect(preference('module.users::home_page', 'admin/dashboard'));
        } else {

            return view('module.users::admin/login');
        }
    }

    /**
     * Attempt to login a user.
     *
     * @param Request               $request
     * @param Redirector            $redirect
     * @param SessionService        $session
     * @param AuthenticationService $authentication
     * @return \Illuminate\Http\RedirectResponse
     */
    public function attempt(
        Request $request,
        Redirector $redirect,
        SessionService $session,
        AuthenticationService $authentication
    ) {
        /**
         * Attempt to login and start a session. Otherwise
         * an exception should be thrown and added to messages.
         */
        try {

            if ($user = $authentication->authenticate($request->all()) and $user instanceof UserInterface) {

                $session->login($user, ($request->get('remember') == 'on'));

                return $redirect->intended(preference('module.users::home_page', 'admin/dashboard'));
            }
        } catch (UserNotFoundException $e) {

            // The user was not found.
            app('streams.messages')->add('error', 'module.users::error.user_not_found');
        } catch (EmailOrUsernameRequiredException $e) {

            // Input validation failed.
            app('streams.messages')->add('error', 'module.users::error.email_or_username_required');
        } catch (PasswordRequiredException $e) {

            // Input validation failed.
            app('streams.messages')->add('error', 'module.users::error.password_required');
        } catch (\Exception $e) {

            // There was some other error.
            app('streams.messages')->add('error', 'error.generic');
        }

        /**
         * If we have made it this far then we've failed.
         * Flash the messages and redirect back to login.
         */
        app('streams.messages')->flash();

        return $redirect->to('admin/login');
    }
}
 