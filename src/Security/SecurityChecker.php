<?php namespace Anomaly\UsersModule\Security;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\UsersModule\Security\Event\SecurityCheckHasFailed;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Redirector;
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
     * The event dispatcher.
     *
     * @var Dispatcher
     */
    protected $events;

    /**
     * The redirect service.
     *
     * @var Redirector
     */
    protected $redirect;

    /**
     * The service container.
     *
     * @var Container
     */
    protected $container;

    /**
     * The extension collection.
     *
     * @var ExtensionCollection
     */
    protected $extensions;

    /**
     * Create a new SecurityChecker instance.
     *
     * @param Dispatcher          $events
     * @param Redirector          $redirect
     * @param Container           $container
     * @param ExtensionCollection $extensions
     */
    public function __construct(
        Dispatcher $events,
        Redirector $redirect,
        Container $container,
        ExtensionCollection $extensions
    ) {
        $this->events     = $events;
        $this->redirect   = $redirect;
        $this->container  = $container;
        $this->extensions = $extensions;
    }

    /**
     * Check authorization.
     *
     * @param UserInterface $user
     * @return Response|bool
     */
    public function check(UserInterface $user = null)
    {
        $extensions = $this->extensions->search('anomaly.module.users::security_check.*');

        foreach ($extensions as $extension) {

            /**
             * If the security check does not return
             * false then we can assume it passed.
             */
            if ($this->container->call(
                    substr(get_class($extension), 0, -9) . 'Handler@handle',
                    compact('user', 'extension')
                ) !== false
            ) {
                continue;
            }

            /**
             * Upon a failed security check we
             * need to change alter response.
             *
             * Typically this means redirecting
             * but any response will do. Check the
             * extension for a response handler or
             * default to the login page.
             */
            $response = substr(get_class($extension), 0, -9) . 'Response';

            if (class_exists($response)) {
                $response = $this->container->call($response . '@make', compact('user', 'extension'));
            } else {
                $response = $this->redirect->to('admin/login');
            }

            $this->events->fire(new SecurityCheckHasFailed($extension));

            return $response;
        }

        return true;
    }
}
