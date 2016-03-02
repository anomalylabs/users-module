<?php namespace Anomaly\UsersModule\Http\Middleware;

use Anomaly\UsersModule\User\UserSecurity;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AuthenticateRequest
 *
 * This class replaces the Laravel version in app/
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\Http\Middleware
 */
class Authenticate
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $guard;

    /**
     * The security utility.
     *
     * @var UserSecurity
     */
    protected $security;

    /**
     * The response factory.
     *
     * @var ResponseFactory
     */
    protected $response;

    /**
     * The redirector utility.
     *
     * @var Redirector
     */
    protected $redirect;

    /**
     * Create a new AuthenticateRequest instance.
     *
     * @param Guard           $guard
     * @param Redirector      $redirect
     * @param ResponseFactory $response
     * @param UserSecurity    $security
     */
    public function __construct(
        Guard $guard,
        Redirector $redirect,
        ResponseFactory $response,
        UserSecurity $security
    ) {
        $this->guard    = $guard;
        $this->redirect = $redirect;
        $this->response = $response;
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
        $response = $this->security->check($this->guard->user());

        if ($response instanceof Response) {
            return $response;
        }

        if ($this->guard->guest()) {
            if ($request->ajax()) {
                return $this->response->make('Unauthorized.', 401);
            } else {
                if ($request->segment(1) === 'admin') {
                    return $this->redirect->guest('admin/login');
                } else {
                    return $this->redirect->guest('login');
                }
            }
        }

        return $next($request);
    }
}
