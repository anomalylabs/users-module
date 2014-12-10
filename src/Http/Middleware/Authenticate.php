<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Middleware;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserRepositoryInterface;
use Closure;
use Illuminate\Contracts\Routing\Middleware;

/**
 * Class Authenticate
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Http\Middleware
 */
class Authenticate implements Middleware
{

    /**
     * Handle the request.
     *
     * @param \Illuminate\Http\Request $request
     * @param callable                 $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next)
    {
        // Skip if we're in the installer.
        if (starts_with($request->path(), 'installer')) {

            return $next($request);
        }

        // Skip if logging in or out.
        if (in_array($request->path(), ['admin/login', 'admin/logout'])) {

            return $next($request);
        }

        // If we're good, proceed.
        if (app('auth')->check()) {

            app('session')->remove('url.intended');

            return $next($request);
        }

        // Login! Stash intended URL.
        app('session')->put('url.intended', $request->fullUrl());

        return redirect('admin/login');
    }
}
 