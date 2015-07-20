<?php namespace Anomaly\UsersModule\Activation\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface ActivationRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation\Contract
 */
interface ActivationRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find an activation by it's code.
     *
     * @param $code
     * @return null|ActivationInterface
     */
    public function findByCode($code);

    /**
     * Find an activation by user ID.
     *
     * @param $id
     * @return null|ActivationInterface
     */
    public function findByUserId($id);
}
