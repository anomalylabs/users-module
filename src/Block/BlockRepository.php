<?php namespace Anomaly\Streams\Addon\Module\Users\Block;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class BlockRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Block
 */
class BlockRepository implements BlockRepositoryInterface
{

    /**
     * The block model.
     *
     * @var
     */
    protected $model;

    /**
     * Create a new BlockRepository instance.
     *
     * @param BlockModel $model
     */
    function __construct(BlockModel $model)
    {
        $this->model = $model;
    }

    /**
     * Block a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function block(UserInterface $user)
    {
        $block = $this->model->newInstance();

        $block->user_id = $user->getId();

        $block->save();

        return $block;
    }

    /**
     * Unblock a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function unblock(UserInterface $user)
    {
        $this->model->where('user_id', $user->getId())->delete();
    }
}
 