<?php namespace Anomaly\UsersModule\Http\Middleware;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\UsersModule\User\UserCheck;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class Authenticate
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The extension collection.
     *
     * @var ExtensionCollection
     */
    protected $extensions;

    /**
     * Create a new filter instance.
     *
     * @param Guard               $auth
     * @param ExtensionCollection $extension
     */
    public function __construct(Guard $auth, ExtensionCollection $extension)
    {
        $this->auth       = $auth;
        $this->extensions = $extension;
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
        /*$user = $this->auth->user();

        $checks = $this->extensions->search('anomaly.module.users::check.*');

        foreach ($checks as $check) {
            if ($check instanceof UserCheck) {
                $check->check($user, $request);
            }
        }*/

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
