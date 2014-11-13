<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface;

/**
 * Class BlockUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class BlockUserCommandHandler
{

    /**
     * Handle the command.
     *
     * @param BlockUserCommand         $command
     * @param BlockRepositoryInterface $blocks
     * @return mixed
     */
    public function handle(BlockUserCommand $command, BlockRepositoryInterface $blocks)
    {
        return $blocks->block($command->getUser());
    }
}
 