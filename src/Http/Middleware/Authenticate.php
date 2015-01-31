<?php namespace Anomaly\UsersModule\Http\Middleware;

use Anomaly\UsersModule\Security\Security;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @var Security
     */
    protected $security;

    /**
     * Create a new filter instance.
     *
     * @param Guard    $auth
     * @param Security $security
     */
    public function __construct(Guard $auth, Security $security)
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
                return redirect()->guest('auth/login');
            }
        }

        return $next($request);
    }
}
