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
class CheckAuthorization implements Middleware
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
        $ignore = ['admin/login', 'admin/logout'];

        if (in_array($request->path(), $ignore) or $this->authorization->check()) {

            return $next($request);
        }

        return redirect('admin/login');
    }
}
 