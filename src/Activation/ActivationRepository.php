<?php namespace Anomaly\UsersModule\Activation;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\UsersModule\Activation\Contract\ActivationInterface;
use Anomaly\UsersModule\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class ActivationRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation
 */
class ActivationRepository extends EntryRepository implements ActivationRepositoryInterface
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
    public function __construct(ActivationModel $model)
    {
        $this->model = $model;
    }

    /**
     * Create a new activation.
     *
     * @param array $attributes
     * @return \Anomaly\Streams\Platform\Model\EloquentModel
     */
    public function create(array $attributes)
    {
        array_set($attributes, 'code', str_random());

        return parent::create($attributes);
    }

    /**
     * Find an activation by it's code.
     *
     * @param $code
     * @return null|ActivationInterface
     */
    public function findByCode($code)
    {
        return $this->model->where('code', $code)->first();
    }

    /**
     * Find an activation by user ID.
     *
     * @param $id
     * @return null|UserInterface
     */
    public function findByUserId($id)
    {
        return $this->model->where('user_id', $id)->first();
    }
}
