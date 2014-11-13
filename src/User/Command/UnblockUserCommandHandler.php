<?php namespace Anomaly\Streams\Addon\Module\Users\User\Command;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface;

/**
 * Class UnblockUserCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User\Command
 */
class UnblockUserCommandHandler
{

    /**
     * Handle the command.
     *
     * @param UnblockUserCommand       $command
     * @param BlockRepositoryInterface $blocks
     * @return mixed
     */
    public function handle(UnblockUserCommand $command, BlockRepositoryInterface $blocks)
    {
        $blocks->unblock($command->getUser());
    }
}
 