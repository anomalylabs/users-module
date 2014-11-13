<?php namespace Anomaly\Streams\Addon\Module\Users\User\Contract;

/**
 * Interface UserRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Contract
 */
interface UserRepositoryInterface
{

    /**
     * Find a user by it's ID.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Find a user by it's credentials.
     *
     * @param array $credentials
     * @return mixed
     */
    public function findByCredentials(array $credentials);

    /**
     * Find a user by a persistence code.
     *
     * @param $code
     * @return mixed
     */
    public function findByPersistenceCode($code);

    /**
     * Touch the last login stamp.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function touchLogin(UserInterface $user);

    /**
     * Touch the last activity stamp and IP.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function touch(UserInterface $user);

    /**
     * Create a new user.
     *
     * @param array $credentials
     * @return mixed
     */
    public function create(array $credentials);

    /**
     * Update an existing user.
     *
     * @param UserInterface $user
     * @param array         $credentials
     * @return mixed
     */
    public function update(UserInterface $user, array $credentials);
}
 