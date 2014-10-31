<?php namespace Anomaly\Streams\Addon\Module\Users\Activation;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationInterface;
use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\Streams\Platform\Model\Users\UsersActivationsEntryModel;

/**
 * Class ActivationModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation
 */
class ActivationModel extends UsersActivationsEntryModel implements ActivationRepositoryInterface, ActivationInterface
{

    /**
     * Observable events.
     *
     * @var array
     */
    protected $observables = [
        'activated',
        'deactivated',
    ];

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
     * Remove an activation by it's user ID.
     *
     * @param $userId
     * @return null
     */
    public function removeActivation($userId)
    {
        $this->whereByUserId($userId)->delete();

        $this->fireModelEvent('deactivated');
    }

    /**
     * Complete an activation by user ID and code.
     *
     * @param $userId
     * @param $code
     * @return bool
     */
    public function completeActivation($userId, $code)
    {
        $activation = $this->findActivationByUserId($userId);

        if ($activation and $activation->code == $code) {

            $activation->code         = null;
            $activation->is_complete  = true;
            $activation->completed_at = time();

            $activation->save();

            $this->fireModelEvent('activated');

            return $activation;
        }

        return null;
    }

    /**
     * Force the completion of an activation for a user.
     *
     * @param $userId
     * @return mixed
     */
    public function forceActivation($userId)
    {
        $activation = $this->findActivationByUserId($userId);

        if (!$activation) {

            $activation = $this->createActivation($userId);
        }

        return $activation->completeActivation($userId, $activation->code);
    }

    /**
     * Find an activation for a given user ID.
     *
     * @param $userId
     * @return mixed
     */
    public function findActivationByUserId($userId)
    {
        return $this->whereUserId($userId)->first();
    }

    /**
     * Find an activation by it's user ID and code.
     *
     * @param $userId
     * @param $code
     * @return mixed
     */
    public function findActivationByUserIdAndCode($userId, $code)
    {
        return $this->whereUserId($userId)->whereCode($code)->first();
    }

    /**
     * Return is_complete flag.
     *
     * @return mixed
     */
    public function itIsComplete()
    {
        return ($this->is_complete);
    }
}
 