<?php namespace Anomaly\UsersModule\User\Contract;

/**
 * Interface UserRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Contract
 */
interface UserRepositoryInterface
{

    /**
     * Create a new user.
     *
     * @param $username
     * @param $email
     * @param $password
     * @return mixed
     */
    public function create($username, $email, $password);

    /**
     * Delete an existing user.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
