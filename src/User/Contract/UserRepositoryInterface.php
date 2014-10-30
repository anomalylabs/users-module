<?php namespace Anomaly\Streams\Addon\Module\Users\User\Contract;

/**
 * Interface UserRepositoryInterface
 *
 * This interface assures that other implementations of
 * users can operate in the users module successfully.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Contract
 */
interface UserRepositoryInterface
{

    /**
     * Create a user.
     *
     * @param array $credentials
     * @return mixed
     */
    public function createUser(array $credentials);

    /**
     * Update a user.
     *
     * @param       $userId
     * @param array $credentials
     * @param array $data
     * @return mixed
     */
    public function updateUser($userId, array $credentials, array $data = []);

    /**
     * @param $userId
     * @param $password
     * @return mixed
     */
    public function changePassword($userId, $password);

    /**
     * Find a user by their login.
     *
     * @param $login
     * @return mixed
     */
    public function findByLogin($login);

    /**
     * @param $login
     * @param $password
     * @return mixed
     */
    public function findByLoginAndPassword($login, $password);

    /**
     * @param $userId
     * @return mixed
     */
    public function findByUserId($userId);

    /**
     * @param $userId
     * @return mixed
     */
    public function touchLastActivity($userId);

    /**
     * @param $userId
     * @return mixed
     */
    public function touchLastLogin($userId);

}
 