<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Contract;

/**
 * Interface PersistenceInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence\Contract
 */
interface PersistenceInterface
{

    /**
     * Get the persistence's code.
     *
     * @return mixed
     */
    public function getCode();

    /**
     * Get the related user.
     *
     * @return mixed
     */
    public function getUser();
}
 