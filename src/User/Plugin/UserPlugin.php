<?php namespace Anomaly\UsersModule\User\Plugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\UsersModule\User\Plugin\Command\GetUser;

/**
 * Class UserPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Plugin
 */
class UserPlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'user',
                function ($identifier = null) {
                    return $this->dispatch(new GetUser($identifier));
                }
            )
        ];
    }
}
