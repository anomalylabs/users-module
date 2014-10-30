<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Contract;

/**
 * Interface PersistenceRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence\Contract
 */
interface PersistenceRepositoryInterface
{

    /**
     * Find a persistence code by user ID or create one.
     *
     * @param $userId
     * @return mixed
     */
    public function findByIdOrCreate($userId);

    /**
     * Forget a persistence code.
     *
     * @param $userId
     * @return mixed
     */
    public function forget($userId);

    /**
     * Find a persistence code by ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findByUserId($userId);

    /**
     * Find a persistence object by user ID and it's code.
     *
     * @param $userId
     * @param $code
     * @return mixed
     */
    public function findByUserIdAndCode($userId, $code);
}
 