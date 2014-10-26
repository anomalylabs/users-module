<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;

class CheckPersistenceCodeCommandHandler
{
    protected $repository;

    function __construct(PersistenceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CheckPersistenceCodeCommand $command)
    {
        return $this->repository->findByUserIdAndCode($command->getUserId(), $command->getCode());
    }
}
 