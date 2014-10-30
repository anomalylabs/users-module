<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

/**
 * Class RemoveActivationCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Command
 */
class RemoveActivationCommandHandler
{

    /**
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new RemoveActivationCommandHandler instance.
     *
     * @param ActivationRepositoryInterface $repository
     */
    function __construct(ActivationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param RemoveActivationCommand $command
     * @return mixed
     */
    public function handle(RemoveActivationCommand $command)
    {
        return $this->repository->removeActivation($command->getUserId());
    }

}
 