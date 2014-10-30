<?php namespace Anomaly\Streams\Addon\Module\Users\Activation;

use Anomaly\Streams\Platform\Model\Users\UsersActivationsEntryModel;
use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

/**
 * Class ActivationModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation
 */
class ActivationModel extends UsersActivationsEntryModel implements ActivationRepositoryInterface
{

    /**
     * Show only completed activations.
     *
     * @param $query
     * @return mixed
     */
    public function scopeCompleted($query)
    {
        return $query->whereIsCompleted(true);
    }

    /**
     * Create a new activation.
     *
     * @param $userId
     * @return $this
     */
    public function createActivation($userId)
    {
        $this->code        = rand_string(40);
        $this->user_id     = $userId;
        $this->is_complete = false;

        $this->save();

        return $this;
    }

    /**
     * Remove an activation by user ID.
     *
     * @param $userId
     * @return null
     */
    public function removeActivation($userId)
    {
        $activation = $this->findByUserId($userId);

        if ($activation) {

            $activation->delete();

            return $activation;

        }

        return null;
    }

    /**
     * Complete an activation by user ID and code.
     *
     * @param $userId
     * @param $code
     * @return bool
     */
    public function complete($userId, $code)
    {
        $activation = $this->findByUserId($userId);

        if ($activation and $activation->code == $code) {

            $activation->code         = null;
            $activation->is_complete  = true;
            $activation->completed_at = time();

            $activation->save();

            return $activation;

        }

        return false;
    }

    /**
     * Force the completion of an activation for a user.
     *
     * @param $userId
     * @return mixed
     */
    public function forceActivation($userId)
    {
        $activation = $this->findByUserId($userId);

        if (!$activation) {

            $activation = $this->createActivation($userId);

        }

        return $activation->complete($userId, $activation->code);
    }

    /**
     * Find an activation for a given user ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findByUserId($userId)
    {
        return $this->whereUserId($userId)->first();
    }
}
 