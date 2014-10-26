<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

class RemoveActivationCommandHandler
{
    protected $repository;

    function __construct(ActivationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(RemoveActivationCommand $command)
    {
        return $this->repository->removeActivation($command->getUserId());
    }
}
 