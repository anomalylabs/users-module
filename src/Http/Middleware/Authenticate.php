<?php namespace Anomaly\UsersModule\Http\Middleware;

use Anomaly\UsersModule\Security\SecurityChecker;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Authenticate
 *
 * This class replaces the Laravel version in app/
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Middleware
 */
class Authenticate
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The security utility.
     *
     * @var SecurityChecker
     */
    protected $security;

    /**
     * Create a new filter instance.
     *
     * @param Guard           $auth
     * @param SecurityChecker $security
     */
    public function __construct(Guard $auth, SecurityChecker $security)
    {
        $this->auth     = $auth;
        $this->security = $security;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $this->auth->user();

        $response = $this->security->check($request, $user);

        if ($response instanceof Response) {
            return $response;
        }

        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('admin/login');
            }
        }

        return $next($request);
    }
}
