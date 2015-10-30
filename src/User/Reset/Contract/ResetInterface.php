<?php namespace Anomaly\UsersModule\Reset\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Interface ResetInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset\Contract
 */
interface ResetInterface extends EntryInterface
{

    /**
     * Get the code.
     *
     * @return null|string
     */
    public function getCode();

    /**
     * Get the user.
     *
     * @return null|UserInterface
     */
    public function getUser();

    /**
     * Set the user.
     *
     * @param UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user);
}
