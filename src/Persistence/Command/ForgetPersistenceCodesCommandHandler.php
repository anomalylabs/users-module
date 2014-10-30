<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;

class ForgetPersistenceCodesCommandHandler
{

    protected $repository;

    function __construct(PersistenceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ForgetPersistenceCodesCommand $command)
    {
        $this->repository->forget($command->getUserId());
    }
}
 