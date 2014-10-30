<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceService;

/**
 * Class FindUserByPersistenceCodeCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class FindUserByPersistenceCodeCommandHandler
{

    /**
     * The persistence service object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Persistence\PersistenceService
     */
    protected $persistence;

    /**
     * Create a new FindUserByPersistenceCodeCommandHandler instance.
     *
     * @param PersistenceService $persistence
     */
    function __construct(PersistenceService $persistence)
    {
        $this->persistence = $persistence;
    }

    /**
     * Handle the command.
     *
     * @param FindUserByPersistenceCodeCommand $command
     * @return null
     */
    public function handle(FindUserByPersistenceCodeCommand $command)
    {
        $persistence = $this->persistence->exists($command->getCode());

        if ($persistence) {

            return $persistence->user;
        }

        return null;
    }
}
 