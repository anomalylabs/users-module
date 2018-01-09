<?php namespace Anomaly\UsersModule\Http\Middleware;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\Streams\Platform\Support\Authorizer;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;

/**
 * Class AuthorizeRoutePermission
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AuthorizeRoutePermission
{

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
     * The authorizer utility.
     *
     * @var Authorizer
     */
    protected $authorizer;

    /**
     * Create a new AuthorizeModuleAccess instance.
     *
     * @param Route      $route
     * @param Redirector $redirect
     * @param MessageBag $messages
     * @param Authorizer $authorizer
     */
    public function __construct(
        Guard $auth,
        Route $route,
        Redirector $redirect,
        MessageBag $messages,
        Authorizer $authorizer
    ) {
        $this->route      = $route;
        $this->redirect   = $redirect;
        $this->messages   = $messages;
        $this->authorizer = $authorizer;
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

        if ($request->segment(1) == 'admin' && !$this->authorizer->authorize(
                'anomaly.module.users::general.control_panel'
            )
        ) {
            abort(403);
        }

        $permission = (array)array_get($this->route->getAction(), 'anomaly.module.users::permission');
        $redirect   = array_get($this->route->getAction(), 'anomaly.module.users::redirect');
        $message    = array_get($this->route->getAction(), 'anomaly.module.users::message');

        if ($permission && !$this->authorizer->authorizeAny($permission, null, true)) {

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
