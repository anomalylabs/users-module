<?php namespace Anomaly\Streams\Addon\Module\Users\Block\Command;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

/**
 * Class BlockUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Block\Command
 */
class BlockUserCommandHandler
{

    use DispatchableTrait;

    /**
     * The block repository interface.
     *
     * @var \Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface
     */
    protected $repository;

    /**
     * Create a new BlockUserCommandHandler instance.
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
     * @param BlockUserCommand $command
     */
    public function handle(BlockUserCommand $command)
    {
        $this->repository->createBlock($command->getUserId());
    }
}
 