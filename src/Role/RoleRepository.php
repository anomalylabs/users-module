<?php namespace Anomaly\Streams\Addon\Module\Users\Role;

use Anomaly\Streams\Addon\Module\Users\Role\Contract\RoleRepositoryInterface;

/**
 * Class RoleRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Role
 */
class RoleRepository implements RoleRepositoryInterface
{

    /**
     * The role model.
     *
     * @var
     */
    protected $model;

    /**
     * Create a new RoleRepository instance.
     *
     * @param RoleModel $model
     */
    function __construct(RoleModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a role by it's ID.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find a role by it's slug.
     *
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Create a new role.
     *
     * @param       $name
     * @param       $slug
     * @param array $permissions
     * @return mixed
     */
    public function create($name, $slug, array $permissions = [])
    {
        $role = $this->model->newInstance();

        $role->name        = $name;
        $role->slug        = $slug;
        $role->permissions = $permissions;

        $role->save();

        return $role;
    }

    /**
     * Delete a role by it's slug.
     *
     * @param $slug
     * @return mixed
     */
    public function delete($slug)
    {
        $role = $this->findBySlug($slug);

        $role->delete();

        return $role;
    }
}
 