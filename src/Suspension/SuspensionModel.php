<?php namespace Anomaly\UsersModule\Suspension;

use Anomaly\Streams\Platform\Model\Users\UsersSuspensionsEntryModel;
use Anomaly\UsersModule\Suspension\Contract\SuspensionInterface;

/**
 * Class SuspensionModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Suspension
 */
class SuspensionModel extends UsersSuspensionsEntryModel implements SuspensionInterface
{

    /**
     * Cache model queries.
     *
     * @var int
     */
    protected $cacheMinutes = 9999;

}
