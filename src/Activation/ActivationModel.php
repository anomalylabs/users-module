<?php namespace Anomaly\Streams\Addon\Module\Users\Activation;

use Anomaly\Streams\Platform\Model\Users\UsersActivationsEntryModel;

class ActivationModel extends UsersActivationsEntryModel
{
    public function scopeCompleted($query)
    {
        return $query->whereIsCompleted(true);
    }

    public function createActivation($userId)
    {
        $this->code        = rand_string(40);
        $this->user_id     = $userId;
        $this->is_complete = false;

        $this->save();

        return $this;
    }

    public function removeActivation($userId)
    {
        $activation = $this->findByUserId($userId);

        if ($activation) {

            $activation->delete();

            return $activation;

        }

        return null;
    }

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

    public function forceActivation($userId)
    {
        $activation = $this->findByUserId($userId);

        if (!$activation) {

            $activation = $this->createActivation($userId);

        }

        return $activation->complete($userId, $activation->code);
    }

    public function findByUserId($userId)
    {
        return $this->whereUserId($userId)->first();;
    }
}
 