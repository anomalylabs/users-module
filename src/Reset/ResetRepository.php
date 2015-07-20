<?php namespace Anomaly\UsersModule\Reset;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\UsersModule\Reset\Contract\ResetRepositoryInterface;

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
}
