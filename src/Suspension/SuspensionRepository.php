<?php namespace Anomaly\UsersModule\Suspension;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\UsersModule\Suspension\Contract\SuspensionInterface;
use Anomaly\UsersModule\Suspension\Contract\SuspensionRepositoryInterface;

/**
 * Class SuspensionRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Suspension
 */
class SuspensionRepository extends EntryRepository implements SuspensionRepositoryInterface
{

    /**
     * The suspension model.
     *
     * @var SuspensionModel
     */
    protected $model;

    /**
     * Create a new SuspensionRepository instance.
     *
     * @param SuspensionModel $model
     */
    public function __construct(SuspensionModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a suspension by user ID.
     *
     * @param $id
     * @return null|SuspensionInterface
     */
    public function findByUserId($id)
    {
        return $this->model->where('user_id', $id)->first();
    }
}
