<?php namespace Anomaly\UsersModule\Http\Middleware;

use Anomaly\UsersModule\Security\SecurityChecker;
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
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Middleware
 */
class AuthenticateRequest
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
     * @param Guard           $auth
     * @param Redirector      $redirect
     * @param ResponseFactory $response
     * @param SecurityChecker $security
     */
    public function __construct(
        Guard $auth,
        Redirector $redirect,
        ResponseFactory $response,
        SecurityChecker $security
    ) {
        $this->auth     = $auth;
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
        $response = $this->security->check($this->auth->user());

        if ($response instanceof Response) {
            return $response;
        }

        if ($this->auth->guest()) {
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
