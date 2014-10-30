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
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new CreatePersistenceCodeCommandHandler instance.
     *
     * @param PersistenceRepositoryInterface $repository
     */
    function __construct(PersistenceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param CreatePersistenceCodeCommand $command
     * @return mixed
     */
    public function handle(CreatePersistenceCodeCommand $command)
    {
        return $this->repository->findByIdOrCreate($command->getUserId());
    }
}
 