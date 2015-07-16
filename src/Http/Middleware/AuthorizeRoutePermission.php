<?php namespace Anomaly\UsersModule\Http\Middleware;

use Anomaly\Streams\Platform\Support\Authorizer;
use Closure;
use Illuminate\Http\Request;
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
     * The authorizer utility.
     *
     * @var Authorizer
     */
    protected $authorizer;

    /**
     * Create a new AuthorizeModuleAccess instance.
     *
     * @param Route      $route
     * @param Authorizer $authorizer
     */
    public function __construct(Route $route, Authorizer $authorizer)
    {
        $this->route      = $route;
        $this->authorizer = $authorizer;
    }

    /**
     * Check the authorization of module access.
     *
     * @param  Request  $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$this->authorizer->authorize(array_get($this->route->getAction(), 'anomaly.module.users::permission'))) {
            abort(403);
        }

        return $next($request);
    }
}
