<?php namespace Anomaly\Streams\Addon\Module\Users\Activation;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationInterface;
use Anomaly\Streams\Platform\Model\Users\UsersActivationsEntryModel;

/**
 * Class ActivationModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation
 */
class ActivationModel extends UsersActivationsEntryModel implements ActivationInterface
{

    /**
     * Get the activation code.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

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
     * Return whether the activation is complete or not.
     *
     * @return mixed
     */
    public function isComplete()
    {
        return ($this->is_complete);
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
 