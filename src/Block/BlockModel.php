<?php namespace Anomaly\Streams\Addon\Module\Users\Block;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockInterface;
use Anomaly\Streams\Platform\Model\Users\UsersBlocksEntryModel;

/**
 * Class BlockModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Block
 */
class BlockModel extends UsersBlocksEntryModel implements BlockInterface
{

    /**
     * Get the related user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Return the user relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(config('module.users::config.users.model'), 'user_id');
    }
}
 