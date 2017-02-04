<?php namespace Anomaly\UsersModule\Http\Middleware;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;

/**
 * Class AuthorizeRouteRoles
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AuthorizeRouteRoles
{

    /**
     * The auth guard.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The route object.
     *
     * @var Route
     */
    protected $route;

    /**
     * The redirect utility.
     *
     * @var Redirector
     */
    protected $redirect;

    /**
     * The message bag.
     *
     * @var MessageBag
     */
    protected $messages;

    /**
     * Create a new AuthorizeModuleAccess instance.
     *
     * @param Guard      $auth
     * @param Route      $route
     * @param Redirector $redirect
     * @param MessageBag $messages
     */
    public function __construct(Route $route, Redirector $redirect, MessageBag $messages, Guard $auth)
    {
        $this->auth     = $auth;
        $this->route    = $route;
        $this->redirect = $redirect;
        $this->messages = $messages;
    }

    /**
     * Check the authorization of module access.
     *
     * @param  Request  $request
     * @param  \Closure $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->path(), ['admin/login', 'admin/logout'])) {
            return $next($request);
        }

        /* @var UserInterface $user */
        $user = $this->auth->user();

        $role     = (array)array_get($this->route->getAction(), 'anomaly.module.users::role');
        $redirect = array_get($this->route->getAction(), 'anomaly.module.users::redirect');
        $message  = array_get($this->route->getAction(), 'anomaly.module.users::message');

        /**
         * If the guest role is desired
         * then pass through if no user.
         */
        if ($role && in_array('guest', $role) && !$user) {
            return $next($request);
        }

        if ($role && (!$user || !$user->hasAnyRole($role))) {

            if ($message) {
                $this->messages->error($message);
            }

            if ($redirect) {
                return $this->redirect->to($redirect);
            }

            abort(403);
        }

        return $next($request);
    }
}
