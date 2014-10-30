<?php namespace Anomaly\Streams\Addon\Module\Users\Persistence\Command;

use Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface;

/**
 * Class ForgetPersistenceCodesCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Persistence\Command
 */
class ForgetPersistenceCodesCommandHandler
{

    /**
     * The user repository object.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Persistence\Contract\PersistenceRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new ForgetPersistenceCodesCommandHandler instance.
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
     * @param ForgetPersistenceCodesCommand $command
     */
    public function handle(ForgetPersistenceCodesCommand $command)
    {
        $this->repository->forget($command->getUserId());
    }
}
 