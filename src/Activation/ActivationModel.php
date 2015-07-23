<?php namespace Anomaly\UsersModule\Activation;

use Anomaly\Streams\Platform\Model\Users\UsersActivationsEntryModel;
use Anomaly\UsersModule\Activation\Contract\ActivationInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class ActivationModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation
 */
class ActivationModel extends UsersActivationsEntryModel implements ActivationInterface
{

    /**
     * Cache model queries.
     *
     * @var int
     */
    protected $cacheMinutes = 9999;

    /**
     * Get the code.
     *
     * @return null|string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the code.
     *
     * @param $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Randomize the code.
     *
     * @return $this
     */
    public function randomizeCode()
    {
        $this->code = str_random();

        return $this;
    }

    /**
     * Get the user.
     *
     * @return null|UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the user.
     *
     * @param UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the completed flag.
     *
     * @return bool
     */
    public function isCompleted()
    {
        return $this->completed;
    }

    /**
     * Set the completed flag.
     *
     * @param $completed
     * @return $this
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;

        return $this;
    }
}
