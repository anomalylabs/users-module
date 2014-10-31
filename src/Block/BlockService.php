<?php namespace Anomaly\Streams\Addon\Module\Users\Block;

use Anomaly\Streams\Addon\Module\Users\Block\Command\BlockUserCommand;
use Anomaly\Streams\Addon\Module\Users\Block\Command\UnblockUserCommand;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class BlockService
 *
 * This class handles user blocks.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Block
 */
class BlockService
{

    use CommandableTrait;

    /**
     * Block a user.
     *
     * @param UserInterface $user
     */
    public function block(UserInterface $user)
    {
        $command = new BlockUserCommand($user->getId());

        $this->execute($command);
    }

    /**
     * Unblock a user.
     *
     * @param UserInterface $user
     */
    public function unblock(UserInterface $user)
    {
        $command = new UnblockUserCommand($user->getId());

        $this->execute($command);
    }
}
 