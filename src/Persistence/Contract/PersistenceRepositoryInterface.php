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
    public function findPersistenceByIdOrCreate($userId);

    /**
     * Forget persistence for a user.
     *
     * @param $userId
     */
    public function forgetPersistence($userId);

    /**
     * Find a persistence code by ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findPersistenceByUserId($userId);

    /**
     * Find a persistence by user ID and code.
     *
     * @param $userId
     * @param $code
     * @return mixed
     */
    public function findPersistenceByUserIdAndCode($userId, $code);
}
 