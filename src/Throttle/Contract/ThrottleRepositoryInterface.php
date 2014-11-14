<?php namespace Anomaly\Streams\Addon\Module\Users\Throttle\Contract;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Interface ThrottleRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Throttle\Contract
 */
interface ThrottleRepositoryInterface
{

    /**
     * Log a throttle entry.
     *
     * @param null          $ipAddress
     * @param UserInterface $user
     * @return mixed
     */
    public function log($ipAddress = null, UserInterface $user = null);

    /**
     * Get the delay for a given throttle type.
     *
     * @param string $type
     * @return mixed
     */
    public function getDelay($type = 'global');
}
 