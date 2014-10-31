<?php namespace Anomaly\Streams\Addon\Module\Users\Block\Command;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

/**
 * Class UnblockUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Block\Command
 */
class UnblockUserCommandHandler
{

    use DispatchableTrait;

    /**
     * The block repository interface.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new UnblockUserCommandHandler instance.
     *
     * @param BlockRepositoryInterface $repository
     */
    function __construct(BlockRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param UnblockUserCommand $command
     */
    public function handle(UnblockUserCommand $command)
    {
        $this->repository->removeBlock($command->getUserId());
    }
}
 