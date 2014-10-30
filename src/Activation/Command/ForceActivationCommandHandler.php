<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

/**
 * Class ForceActivationCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Command
 */
class ForceActivationCommandHandler
{

    /**
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new ForceActivationCommandHandler interface.
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
     * @param ForceActivationCommand $command
     * @return mixed
     */
    public function handle(ForceActivationCommand $command)
    {
        return $this->repository->forceActivation($command->getUserId());
    }

}
 