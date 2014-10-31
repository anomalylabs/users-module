<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;

/**
 * Class CreatePersistenceCodeCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence\Command
 */
class CreatePersistenceCodeCommandHandler
{

    /**
     * The persistence repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface
     */
    protected $persistences;

    /**
     * Create a new CreatePersistenceCodeCommandHandler instance.
     *
     * @param PersistenceRepositoryInterface $persistences
     */
    function __construct(PersistenceRepositoryInterface $persistences)
    {
        $this->persistences = $persistences;
    }

    /**
     * Handle the command.
     *
     * @param CreatePersistenceCodeCommand $command
     * @return mixed
     */
    public function handle(CreatePersistenceCodeCommand $command)
    {
        return $this->persistences->findPersistenceByIdOrCreate($command->getUserId());
    }
}
 