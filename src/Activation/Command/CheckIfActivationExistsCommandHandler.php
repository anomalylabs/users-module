<?php namespace Anomaly\Streams\Addon\Module\Users\Activation\Command;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

/**
 * Class CheckIfActivationExistsCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation\Command
 */
class CheckIfActivationExistsCommandHandler
{

    /**
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new CheckIfActivationExistsCommandHandler instance.
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
     * @param CheckIfActivationExistsCommand $command
     * @return mixed
     */
    public function handle(CheckIfActivationExistsCommand $command)
    {
        return $this->repository->findByUserId($command->getUserId());
    }

}
 