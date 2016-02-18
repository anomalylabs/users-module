<?php namespace Anomaly\UsersModule\Role\Command;

use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetRole
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\Role\Command
 */
class GetRole implements SelfHandling
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
     * @param RoleRepositoryInterface $roles
     * @return \Anomaly\Streams\Platform\Model\EloquentModel|\Anomaly\UsersModule\Role\Contract\RoleInterface|null
     */
    public function handle(RoleRepositoryInterface $roles)
    {
        if (is_numeric($this->identifier)) {
            return $roles->find($this->identifier);
        }

        if (!is_numeric($this->identifier)) {
            return $roles->findBySlug($this->identifier);
        }

        return null;
    }
}
