<?php namespace Anomaly\Streams\Addon\Module\Users\Block\Contract;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

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
     * Block a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function block(UserInterface $user);

    /**
     * Unblock a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function unblock(UserInterface $user);
}
 