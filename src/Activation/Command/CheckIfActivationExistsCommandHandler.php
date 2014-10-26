<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

class CheckIfActivationExistsCommandHandler
{
    protected $repository;

    function __construct(ActivationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(CheckIfActivationExistsCommand $command)
    {
        return $this->repository->findByUserId($command->getUserId());
    }
}
 