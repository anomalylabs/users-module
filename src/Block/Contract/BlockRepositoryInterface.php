<?php namespace Anomaly\Streams\Addon\Module\Users\Block\Contract;

/**
 * Interface BlockRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Block\Contract
 */
interface BlockRepositoryInterface
{

    /**
     * Create a user block.
     *
     * @param $userId
     * @return mixed
     */
    public function createBlock($userId);

    /**
     * Remove a user block.
     *
     * @param $userId
     * @return mixed
     */
    public function removeBlock($userId);

    /**
     * Find a block by it's user ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findBlockByUserId($userId);
}
 