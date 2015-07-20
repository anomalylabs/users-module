<?php namespace Anomaly\UsersModule\Activation\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Interface ActivationInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation\Contract
 */
interface ActivationInterface extends EntryInterface
{

    /**
     * Get the code.
     *
     * @return null|string
     */
    public function getCode();

    /**
     * Set the code.
     *
     * @param $code
     * @return $this
     */
    public function setCode($code);

    /**
     * Randomize the code.
     *
     * @return $this
     */
    public function randomizeCode();

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

    /**
     * Get the completed flag.
     *
     * @return bool
     */
    public function isCompleted();

    /**
     * Set the completed flag.
     *
     * @param $completed
     * @return $this
     */
    public function setCompleted($completed);
}
