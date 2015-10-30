<?php namespace Anomaly\UsersModule\Reset;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\UsersModule\Reset\Contract\ResetInterface;
use Anomaly\UsersModule\Reset\Contract\ResetRepositoryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class ResetRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset
 */
class ResetRepository extends EntryRepository implements ResetRepositoryInterface
{

    /**
     * The reset model.
     *
     * @var ResetModel
     */
    protected $model;

    /**
     * Create a new ResetRepository instance.
     *
     * @param ResetModel $model
     */
    public function __construct(ResetModel $model)
    {
        $this->model = $model;
    }

    /**
     * Create a new reset.
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
     * Find an reset by it's code.
     *
     * @param $code
     * @return null|ResetInterface
     */
    public function findByCode($code)
    {
        return $this->model->where('code', $code)->first();
    }

    /**
     * Find an reset by user ID.
     *
     * @param $id
     * @return null|UserInterface
     */
    public function findByUserId($id)
    {
        return $this->model->where('user_id', $id)->first();
    }
}
