<?php namespace Anomaly\UsersModule\Http\Middleware;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\Streams\Platform\Support\Authorizer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;

/**
 * Class AuthorizeRoutePermission
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Middleware
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
    public function __construct(Route $route, Redirector $redirect, MessageBag $messages, Authorizer $authorizer)
    {
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

        if (!$this->authorizer->authorize('anomaly.module.users::general.control_panel')) {
            abort(403);
        }

        if (!$this->authorizer->authorize(array_get($this->route->getAction(), 'anomaly.module.users::permission'))) {

            if ($message = array_get($this->route->getAction(), 'anomaly.module.users::message')) {
                $this->messages->error($message);
            }

            if ($redirect = array_get($this->route->getAction(), 'anomaly.module.users::redirect')) {
                return $this->redirect->to($redirect);
            }

            abort(403);
        }

        return $next($request);
    }
}
