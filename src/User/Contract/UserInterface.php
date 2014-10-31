<?php namespace Anomaly\Streams\Addon\Module\Users\User\Contract;

/**
 * Interface UserInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Contract
 */
interface UserInterface
{

    /**
     * @return mixed
     */
    public function getId();

    /**
     * Set the user password.
     *
     * This should implement
     * the hashing method too.
     *
     * @param $password
     * @return mixed
     */
    public function setPassword($password);
}
 