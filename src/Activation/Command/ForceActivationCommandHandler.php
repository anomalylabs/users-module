<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

class ForceActivationCommandHandler
{
    protected $repository;

    function __construct(ActivationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ForceActivationCommand $command)
    {
        return $this->repository->forceActivation($command->getUserId());
    }
}
 