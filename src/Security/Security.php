<?php namespace Anomaly\UsersModule\Security;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class Security
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Security
 */
class Security
{

    /**
     * The extension collection.
     *
     * @var ExtensionCollection
     */
    protected $extensions;

    /**
     * Create a new Security instance.
     *
     * @param ExtensionCollection $extensions
     */
    public function __construct(ExtensionCollection $extensions)
    {
        $this->extensions = $extensions;
    }

    /**
     * Check authorization.
     *
     * @param UserInterface $user
     */
    public function check(UserInterface $user = null)
    {
        $checks = $this->extensions->search('anomaly.module.users::security_check.*');

        foreach ($checks as $check) {
            $this->runSecurityCheck($check, $user);
        }
    }

    /**
     * Run a security check.
     *
     * @param SecurityCheckExtension $check
     * @param UserInterface          $user
     */
    protected function runSecurityCheck(SecurityCheckExtension $check, UserInterface $user)
    {
        $check->check($user);
    }
}
