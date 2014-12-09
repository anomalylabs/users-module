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

    protected $blocks;

    function __construct(BlockRepositoryInterface $blocks)
    {
        $this->blocks = $blocks;
    }

    /**
     * Handle the command.
     *
     * @param BlockUserCommand         $command
     * @return mixed
     */
    public function handle(BlockUserCommand $command)
    {
        return $this->blocks->block($command->getUser());
    }
}
 