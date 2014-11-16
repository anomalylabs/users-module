<?php namespace Anomaly\Streams\Addon\Module\Users\Profile;

use Anomaly\Streams\Addon\Module\Users\Profile\Contract\ProfileRepositoryInterface;

/**
 * Class ProfileRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Profile
 */
class ProfileRepository implements ProfileRepositoryInterface
{

    /**
     * The model object.
     *
     * @var ProfileModel
     */
    protected $model;

    /**
     * Create a new ProfileRepository instance.
     *
     * @param ProfileModel $model
     */
    function __construct(ProfileModel $model)
    {
        $this->model = $model;
    }

    /**
     * Create a new user profile.
     *
     * @param       $userId
     * @param array $data
     * @return mixed
     */
    public function create($userId, array $data = [])
    {
        $profile = $this->model->newInstance();

        $profile->user_id = $userId;

        $profile->save();

        return $profile;
    }
}
 