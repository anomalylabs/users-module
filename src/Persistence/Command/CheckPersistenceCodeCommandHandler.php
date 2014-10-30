<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;

/**
 * Class CheckPersistenceCodeCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence\Command
 */
class CheckPersistenceCodeCommandHandler
{

    /**
     * Create the user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new CheckPersistenceCodeCommandHandler instance.
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
     * @param CheckPersistenceCodeCommand $command
     * @return mixed
     */
    public function handle(CheckPersistenceCodeCommand $command)
    {
        return $this->repository->findByUserIdAndCode($command->getUserId(), $command->getCode());
    }
}
 