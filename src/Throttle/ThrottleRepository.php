<?php namespace Anomaly\Streams\Addon\Module\Users\Throttle;

use Anomaly\Streams\Addon\Module\Users\Throttle\Contract\ThrottleRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class ThrottleRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Throttle
 */
class ThrottleRepository implements ThrottleRepositoryInterface
{

    /**
     * The throttle model.
     *
     * @var
     */
    protected $model;

    /**
     * Create a new ThrottleRepository instance.
     *
     * @param $model
     */
    function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Log a throttle entry.
     *
     * @param null          $ipAddress
     * @param UserInterface $user
     * @return mixed
     */
    public function log($ipAddress = null, UserInterface $user = null)
    {
        // TODO: Implement log() method.
    }

    /**
     * Get the delay for a given throttle type.
     *
     * @param string $type
     * @return mixed
     */
    public function getDelay($type = 'global')
    {
        // TODO: Implement getDelay() method.
    }
}
 