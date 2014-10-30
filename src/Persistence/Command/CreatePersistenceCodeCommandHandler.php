<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;

class CreatePersistenceCodeCommandHandler
{

    protected $repository;

    function __construct(PersistenceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CreatePersistenceCodeCommand $command)
    {
        return $this->repository->findByIdOrCreate($command->getUserId());
    }
}
 