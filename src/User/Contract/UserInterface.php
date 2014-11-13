<?php namespace Anomaly\Streams\Addon\Module\Users\User\Contract;

/**
 * Interface UserInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
interface UserInterface
{

    /**
     * Get the user's ID.
     *
     * @return mixed
     */
    public function getId();

    /**
     * Get the user's email.
     *
     * @return mixed
     */
    public function getEmail();

    /**
     * Get the user's username.
     *
     * @return mixed
     */
    public function getUsername();

    /**
     * Get the user's password.
     *
     * @return mixed
     */
    public function getPassword();
}
 