<?php namespace Anomaly\UsersModule\Security;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\UsersModule\User\Contract\UserInterface;

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
     * @param UserInterface $user
     * @return bool
     */
    abstract public function check(UserInterface $user = null);
}
