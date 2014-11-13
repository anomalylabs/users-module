<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Anomaly\Streams\Addon\Module\Users\User\UserModel;
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
     * @return \Illuminate\Http\RedirectResponse|Redirector|\Illuminate\View\View
     */
    public function login()
    {
        /**
         * If the user is already logged in
         * then send them to their home page.
         */
        if (app('auth')->check()) {

            return redirect(preference('module.users::home_page', 'admin/dashboard'));
        } else {

            return view('module.users::admin/login');
        }
    }

    /**
     * Attempt to login a user.
     *
     * @param Request    $request
     * @param Redirector $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function attempt(
        Request $request,
        Redirector $redirect
    ) {
        /**
         * Attempt to login and start a session. Otherwise
         * an exception should be thrown and added to messages.
         */
        try {

            if ($user = app('auth')->authenticate($request->all()) and $user instanceof UserModel) {

                app('auth')->login($user, ($request->get('remember') == 'on'));

                return $redirect->intended(preference('module.users::home_page', 'admin/dashboard'));
            }
        } catch (UserNotFoundException $e) {

            // The user was not found.
            app('streams.messages')->add('error', 'module.users::error.user_not_found');
        } catch (LoginRequiredException $e) {

            // Input validation failed.
            app('streams.messages')->add('error', 'module.users::error.login_required');
        } catch (PasswordRequiredException $e) {

            // Input validation failed.
            app('streams.messages')->add('error', 'module.users::error.password_required');
        } catch (\Exception $e) {

            // If debug - bitch.
            if (config('app.debug')) {

                throw new \Exception($e->getMessage());
            }

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
 