<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Middleware;

use Anomaly\Streams\Addon\Module\Users\Authorization\AuthorizationService;
use Closure;
use Illuminate\Contracts\Routing\Middleware;

class Authenticator implements Middleware
{

    protected $authorization;

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
        $ignore = ['admin/login', 'admin/logout'];

        if (in_array($request->path(), $ignore) or $this->authorization->check()) {

            return $next($request);
        }

        return redirect('admin/login');
    }
}
 