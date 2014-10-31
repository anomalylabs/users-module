<?php namespace Anomaly\Streams\Addon\Module\Users\Block;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockInterface;
use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface;
use Anomaly\Streams\Platform\Model\Users\UsersBlocksEntryModel;

/**
 * Class BlockModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Block
 */
class BlockModel extends UsersBlocksEntryModel implements BlockInterface, BlockRepositoryInterface
{

    /**
     * Observable events.
     *
     * @var array
     */
    protected $observables = [
        'blocked',
        'unblocked',
    ];

    /**
     * Create a user block.
     *
     * @param $userId
     * @return mixed
     */
    public function createBlock($userId)
    {
        $this->user_id = $userId;

        $this->save();

        $this->fireModelEvent('blocked');

        return $this;
    }

    /**
     * Remove a user block.
     *
     * @param $userId
     * @return mixed
     */
    public function removeBlock($userId)
    {
        $block = $this->findBlockByUserId($userId);

        if ($block) {

            $block->delete();

            $block->fireModelEvent('unblocked');
        }


        return $block;
    }

    /**
     * Find a block by it's user ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findBlockByUserId($userId)
    {
        return $this->whereUserId($userId)->first();
    }
}
 