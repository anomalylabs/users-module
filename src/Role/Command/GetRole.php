<?php namespace Anomaly\UsersModule\Role\Command;

use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\Support\Presenter;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;

/**
 * Class GetRole
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class GetRole
{

    /**
     * The role identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetRole instance.
     *
     * @param $identifier
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param  RoleRepositoryInterface          $roles
     * @return EloquentModel|RoleInterface|null
     */
    public function handle(RoleRepositoryInterface $roles)
    {
        if (is_object($this->identifier)) {
            if ($this->identifier instanceof Presenter) {
                return $this->identifier->getObject();
            }

            if ($this->identifier instanceof EloquentModel) {
                return $this->identifier;
            }
        }

        if (is_string($this->identifier)) {
            return $roles->findBySlug($this->identifier);
        }

        if (is_numeric($this->identifier)) {
            return $roles->find($this->identifier);
        }

        return null;
    }

}
