<?php namespace Anomaly\UsersModule\Reset\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface ResetRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset\Contract
 */
interface ResetRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a reset by it's code.
     *
     * @param $code
     * @return null|ResetInterface
     */
    public function findByCode($code);

    /**
     * Find a reset by user ID.
     *
     * @param $id
     * @return null|ResetInterface
     */
    public function findByUserId($id);
}
