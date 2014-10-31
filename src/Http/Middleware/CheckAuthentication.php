<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Middleware;

use Anomaly\Streams\Addon\Module\Users\Authorization\AuthorizationService;
use Closure;
use Illuminate\Contracts\Routing\Middleware;

/**
 * Class CheckAuthorization
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Http\Middleware
 */
class CheckAuthentication implements Middleware
{

    /**
     * The authorization service object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Authorization\AuthorizationService
     */
    protected $authorization;

    /**
     * Create a new CheckAuthorization instance.
     *
     * @param AuthorizationService $authorization
     */
    function __construct(AuthorizationService $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (starts_with($request->path(), 'installer')) {

            return $next($request);
        }

        if (in_array($request->path(), ['admin/login', 'admin/logout'])) {

            return $next($request);
        }

        if ($this->authorization->check()) {

            app('session')->remove('url.intended');

            return $next($request);
        }

        app('session')->put('url.intended', $request->fullUrl());

        return redirect('admin/login');
    }
}
 