<?php namespace Anomaly\UsersModule\Security\Listener;

use Anomaly\Streams\Platform\Support\Authorizer;
use Illuminate\Routing\Route;

/**
 * Class AuthorizeRoute
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Security\Listener
 */
class AuthorizeRoute
{

    /**
     * The route object.
     *
     * @var Route
     */
    protected $route;

    /**
     * The authorizer.
     *
     * @var Authorizer
     */
    protected $authorizer;

    /**
     * Create a new AuthorizeRoute instance.
     *
     * @param Route      $route
     * @param Authorizer $authorizer
     */
    function __construct(Route $route, Authorizer $authorizer)
    {
        $this->route      = $route;
        $this->authorizer = $authorizer;
    }

    /**
     * Handle the event.
     */
    public function handle()
    {
        if ($permission = array_get($this->route->getAction(), 'permission')) {
            if (!$this->authorizer->authorize($permission)) {
                abort(403);
            }
        }
    }
}
