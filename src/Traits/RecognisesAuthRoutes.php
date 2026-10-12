<?php namespace Anomaly\UsersModule\Traits;

use Illuminate\Http\Request;

/**
 * Trait RecognisesAuthRoutes
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 */
trait RecognisesAuthRoutes
{

    /**
     * Return whether the request is for
     * the control panel login or logout.
     *
     * @param  Request $request
     * @return bool
     */
    protected function isLoginRoute(Request $request)
    {
        return in_array($request->path(), ['admin/login', 'admin/logout']);
    }

    /**
     * Return whether the request is for a two-factor
     * step that a pending login has to reach.
     *
     * @param  Request $request
     * @return bool
     */
    protected function isTwoFactorRoute(Request $request)
    {
        return in_array(
            $request->path(),
            [
                'admin/two-factor',
                'admin/two-factor/setup',
                'admin/two-factor/email',
                'admin/two-factor/recovery-codes',
                'admin/two-factor/continue',
            ]
        );
    }

    /**
     * Return whether the request is for the
     * signed in user's two-factor settings.
     *
     * @param  Request $request
     * @return bool
     */
    protected function isTwoFactorManageRoute(Request $request)
    {
        return in_array(
            $request->path(),
            [
                'admin/two-factor/manage',
                'admin/two-factor/disable',
                'admin/two-factor/regenerate',
            ]
        );
    }
}
