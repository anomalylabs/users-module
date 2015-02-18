<?php namespace Anomaly\UsersModule\Security;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\UsersModule\User\Contract\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class SecurityCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Security
 */
abstract class SecurityCheckExtension extends Extension
{

    /**
     * Run the security check.
     *
     * @param Request       $request
     * @param User $user
     * @return void|Response
     */
    abstract public function check(Request $request, User $user = null);
}
