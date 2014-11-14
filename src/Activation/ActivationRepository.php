<?php namespace Anomaly\Streams\Addon\Module\Users\Activation;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class ActivationRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Activation
 */
class ActivationRepository implements ActivationRepositoryInterface
{

    /**
     * The activation model.
     *
     * @var ActivationModel
     */
    protected $model;

    /**
     * Create a new ActivationRepository instance.
     *
     * @param ActivationModel $model
     */
    function __construct(ActivationModel $model)
    {
        $this->model = $model;
    }

    /**
     * Create a new activation for a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function create(UserInterface $user)
    {
        $activation = $this->model->newInstance();

        $activation->user_id = $user->getId();

        $activation->code = rand_string(40);

        $activation->save();

        return $activation;
    }

    /**
     * Delete the activations associated with a user.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function delete(UserInterface $user)
    {
        $this->model->where('user_id', $user->getId())->delete();
    }

    /**
     * Complete an activation code for a user.
     *
     * @param UserInterface $user
     * @param               $code
     * @return mixed
     */
    public function complete(UserInterface $user, $code)
    {
        $activation = $this->model->where('user_id', $user->getId())->where('code', $code)->first();

        $activation->code         = null;
        $activation->is_complete  = true;
        $activation->completed_at = time();

        $activation->save();
    }

    /**
     * Delete all expired activations.
     *
     * @return mixed
     */
    public function deleteExpired()
    {
        $expired = date('Y-m-d H:i:s', time() - config('module.users::config.activations.expires'));

        $this->model->where('created_at', '<', $expired)->delete();
    }
}
 