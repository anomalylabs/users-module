<?php namespace Anomaly\UsersModule\Reset;

use Anomaly\Streams\Platform\Model\Users\UsersResetsEntryModel;
use Anomaly\UsersModule\Reset\Contract\ResetInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class ResetModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset
 */
class ResetModel extends UsersResetsEntryModel implements ResetInterface
{

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
}
