<?php namespace Anomaly\UsersModule\Security;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SecurityChecker
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\SecurityChecker
 */
class SecurityChecker
{

    /**
     * The extension collection.
     *
     * @var ExtensionCollection
     */
    protected $extensions;

    /**
     * Create a new SecurityChecker instance.
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
     * @param Request       $request
     * @param UserInterface $user
     * @return Response|void
     */
    public function check(Request $request, UserInterface $user = null)
    {
        $checks = $this->extensions->search('anomaly.module.users::security_check.*');

        foreach ($checks as $check) {
            $response = $this->runSecurityCheck($check, $request, $user);

            if ($response instanceof Response) {
                return $response;
            }
        }
    }

    /**
     * Run a security check.
     *
     * @param SecurityCheckExtension $check
     * @param Request                $request
     * @param User          $user
     * @return \Illuminate\Http\Response|void
     */
    protected function runSecurityCheck(SecurityCheckExtension $check, Request $request, UserInterface $user = null)
    {
        return $check->check($request, $user);
    }
}
