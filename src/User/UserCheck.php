<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Http\Request;

/**
 * Class UserCheck
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
abstract class UserCheck extends Extension
{

    /**
     * Check authorization of the current user.
     *
     * @param UserInterface $user
     */
    abstract public function check(UserInterface $user = null, Request $request);
}
