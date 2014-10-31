<?php namespace Anomaly\Streams\Addon\Module\Users\Block;

use Anomaly\Streams\Addon\Module\Users\Block\Event\UserWasBlockedEvent;
use Anomaly\Streams\Addon\Module\Users\Block\Event\UserWasUnblockedEvent;
use Anomaly\Streams\Platform\Support\Observer;
use Anomaly\Streams\Platform\Traits\DispatchableTrait;

/**
 * Class BlockModelObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Block
 */
class BlockModelObserver extends Observer
{

    /**
     * Fire when a user is blocked.
     *
     * @param BlockModel $block
     */
    public function blocked(BlockModel $block)
    {
        $this->dispatch(new UserWasBlockedEvent($block->user_id));
    }

    /**
     * Fire when a user is unblocked.
     *
     * @param BlockModel $block
     */
    public function unblocked(BlockModel $block)
    {
        $this->dispatch(new UserWasUnblockedEvent($block->user_id));
    }
}
 