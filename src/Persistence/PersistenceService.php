<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence;

use Anomaly\Streams\Addon\Module\Users\Persistence\Command\CheckPersistenceCodeCommand;
use Anomaly\Streams\Addon\Module\Users\Persistence\Command\CreatePersistenceCodeCommand;
use Anomaly\Streams\Addon\Module\Users\Persistence\Command\ForgetPersistenceCodesCommand;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class PersistenceService
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence
 */
class PersistenceService
{

    use CommandableTrait;

    /**
     * Persist a user ID.
     *
     * @param $userId
     * @return mixed
     */
    public function persist($userId)
    {
        $command = new CreatePersistenceCodeCommand($userId);

        return $this->execute($command);
    }

    /**
     * Forget a user ID.
     *
     * @param $userId
     */
    public function forget($userId)
    {
        $command = new ForgetPersistenceCodesCommand($userId);

        $this->execute($command);
    }

    /**
     * Check for a persisted user ID.
     *
     * @param $userId
     * @param $code
     * @return mixed
     */
    public function check($userId, $code)
    {
        $command = new CheckPersistenceCodeCommand($userId, $code);

        return $this->execute($command);
    }
}
 