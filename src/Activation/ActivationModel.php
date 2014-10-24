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
        $this->code         = rand_string(40);
        $this->user_id      = $userId;
        $this->is_completed = false;

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

            return $activation;

        }

        return false;
    }

    public function findByUserId($userId)
    {
        $activation = $this->whereUserId($userId)->first();

        return $activation ? : false;
    }
}
 