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
     * @return mixed
     */
    public function createActivation($userId);

    /**
     * Remove activation for a user.
     *
     * @param $userId
     * @return mixed
     */
    public function removeActivation($userId);

    /**
     * Complete the activation for a user.
     *
     * @param $userId
     * @param $code
     * @return mixed
     */
    public function complete($userId, $code);

    /**
     * Force completed activation for a user.
     *
     * @param $userId
     * @return mixed
     */
    public function forceActivation($userId);

    /**
     * Find an activation code for a user.
     *
     * @param $userId
     * @return mixed
     */
    public function findByUserId($userId);

}
 