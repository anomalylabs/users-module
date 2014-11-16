<?php namespace Anomaly\Streams\Addon\Module\Users\Profile\Contract;

/**
 * Interface ProfileRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Profile\Contract
 */
interface ProfileRepositoryInterface
{

    /**
     * Create a new user profile.
     *
     * @param       $userId
     * @param array $data
     * @return mixed
     */
    public function create($userId, array $data = []);
}
 