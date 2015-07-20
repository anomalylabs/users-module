<?php namespace Anomaly\UsersModule\Suspension\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface SuspensionRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Suspension\Contract
 */
interface SuspensionRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a suspension by user ID.
     *
     * @param $id
     * @return null|SuspensionInterface
     */
    public function findByUserId($id);
}
