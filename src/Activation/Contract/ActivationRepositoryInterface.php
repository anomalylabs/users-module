<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Contract;

/**
 * Interface ActivationRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Contract
 */
interface ActivationRepositoryInterface
{

    /**
     * Create a new activation for a user.
     *
     * @param $userId
     */
    public function createActivation($userId);

    /**
     * Remove activation for a user.
     *
     * @param $userId
     */
    public function removeActivation($userId);

    /**
     * Complete the activation for a user.
     *
     * @param $userId
     * @param $code
     */
    public function completeActivation($userId, $code);

    /**
     * Force completed activation for a user.
     *
     * @param $userId
     */
    public function forceActivation($userId);

    /**
     * Find an activation by it's user ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findActivationByUserId($userId);

    /**
     * Find an activation by it's user ID and code.
     *
     * @param $userId
     * @param $code
     * @return mixed
     */
    public function findActivationByUserIdAndCode($userId, $code);
}
 