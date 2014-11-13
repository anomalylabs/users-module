<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Contract;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

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
     * @param UserInterface $user
     * @return mixed
     */
    public function create(UserInterface $user);

    /**
     * Delete the activations associated with a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function delete(UserInterface $user);

    /**
     * Complete an activation code for a user.
     *
     * @param UserInterface $user
     * @param               $code
     * @return mixed
     */
    public function complete(UserInterface $user, $code);

    /**
     * Delete all expired activations.
     *
     * @return mixed
     */
    public function deleteExpired();
}
 