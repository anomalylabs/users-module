<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Contract;

/**
 * Class PersistenceInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence\Contract
 */
class PersistenceInterface
{

    /**
     * Get the persistence code.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }
}
 