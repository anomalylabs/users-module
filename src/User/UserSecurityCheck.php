<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\UsersModule\User\Contract\User;
use Illuminate\Auth\Guard;

/**
 * Class UserSecurityCheck
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User
 */
class UserSecurityCheck
{

    /**
     * The authentication guard.
     *
     * @var Guard
     */
    protected $guard;

    /**
     * The extension collection.
     *
     * @var ExtensionCollection
     */
    protected $extensions;

    /**
     * Create a new UserSecurityCheck instance.
     *
     * @param Guard               $guard
     * @param ExtensionCollection $extensions
     */
    public function __construct(Guard $guard, ExtensionCollection $extensions)
    {
        $this->guard      = $guard;
        $this->extensions = $extensions;
    }

    /**
     * Check authentication of the current user.
     *
     * @return null|User
     */
    public function check()
    {
        $checks = $this->extensions->search('anomaly.module.users::check.*');
    }
}
