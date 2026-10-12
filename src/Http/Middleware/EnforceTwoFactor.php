<?php namespace Anomaly\UsersModule\Http\Middleware;

use Anomaly\UsersModule\Traits\RecognisesAuthRoutes;
use Anomaly\UsersModule\User\TwoFactor\TwoFactor;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

/**
 * Class EnforceTwoFactor
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
class EnforceTwoFactor
{

    use RecognisesAuthRoutes;

    /**
     * The auth guard.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The two-factor utility.
     *
     * @var TwoFactor
     */
    protected $twoFactor;

    /**
     * Create a new EnforceTwoFactor instance.
     *
     * @param Guard     $auth
     * @param TwoFactor $twoFactor
     */
    public function __construct(Guard $auth, TwoFactor $twoFactor)
    {
        $this->auth      = $auth;
        $this->twoFactor = $twoFactor;
    }

    /**
     * Send a signed in user to the challenge or setup
     * when the requested context needs a factor
     * this session has not passed.
     *
     * @param  Request $request
     * @param  Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$user = $this->auth->user()) {
            return $next($request);
        }

        $this->twoFactor->trustRemembered($user);

        if (
            $this->isLoginRoute($request)
            || $this->isTwoFactorRoute($request)
            || in_array($request->path(), ['logout', 'auth/logout'])
        ) {
            return $next($request);
        }

        $context = $request->segment(1) === 'admin' ? 'admin' : 'public';

        if (!$requirement = $this->twoFactor->requirement($user, $context)) {
            return $next($request);
        }

        if ($request->expectsJson()) {
            abort(403);
        }

        return redirect()->guest($this->twoFactor->url($requirement, $context));
    }
}
