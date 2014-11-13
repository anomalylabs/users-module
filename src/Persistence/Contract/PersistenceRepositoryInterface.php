<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Contract;

use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Interface PersistenceRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence\Contract
 */
interface PersistenceRepositoryInterface
{

    /**
     * Check the current session for a persistence code.
     *
     * @return mixed
     */
    public function check();

    /**
     * Create a new persistence code for a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function create(UserInterface $user);

    /**
     * Persist a user session.
     *
     * @param UserInterface $user
     * @param bool          $remember
     * @return mixed
     */
    public function persist(UserInterface $user, $remember = false);

    /**
     * Flush persistence for a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function flush(UserInterface $user);

    /**
     * Remove the persistence bound to the current session.
     *
     * @return mixed
     */
    public function forget();

    /**
     * Find a persistence by it's code.
     *
     * @param $code
     * @return mixed
     */
    public function findByCode($code);
}
 