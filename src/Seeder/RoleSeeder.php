<?php namespace Anomaly\UsersModule\Seeder;

use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;

/**
 * Class RoleSeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\Seeder
 */
class RoleSeeder extends Seeder
{

    /**
     * The role repository.
     *
     * @var RoleRepositoryInterface
     */
    protected $roles;

    /**
     * Create a new RoleSeeder instance.
     *
     * @param RoleRepositoryInterface $roles
     */
    public function __construct(RoleRepositoryInterface $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->roles->truncate();

        $this->roles->create(
            [
                'en'   => [
                    'name'        => 'Admin',
                    'description' => 'The super admin role.'
                ],
                'slug' => 'admin'
            ]
        );

        $this->roles->create(
            [
                'en'   => [
                    'name'        => 'User',
                    'description' => 'The default user role.'
                ],
                'slug' => 'user'
            ]
        );
    }
}
