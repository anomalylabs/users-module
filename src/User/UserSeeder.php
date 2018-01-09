<?php namespace Anomaly\UsersModule\User;

use Anomaly\Streams\Platform\Application\Command\ReadEnvironmentFile;
use Anomaly\Streams\Platform\Application\Command\WriteEnvironmentFile;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UserSeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UserSeeder extends Seeder
{

    use DispatchesJobs;

    /**
     * The user repository.
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * The role repository.
     *
     * @var RoleRepositoryInterface
     */
    protected $roles;

    /**
     * The activator utility.
     *
     * @var UserActivator
     */
    protected $activator;

    /**
     * Create a new UserSeeder instance.
     *
     * @param UserRepositoryInterface $users
     * @param RoleRepositoryInterface $roles
     * @param UserActivator           $activator
     */
    public function __construct(
        UserRepositoryInterface $users,
        RoleRepositoryInterface $roles,
        UserActivator $activator
    ) {
        $this->users     = $users;
        $this->roles     = $roles;
        $this->activator = $activator;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {

        $admin = $this->roles->findBySlug('admin');
        $user  = $this->roles->findBySlug('user');

        $this->users->unguard();

        $data = $this->dispatch(new ReadEnvironmentFile());

        /* @var UserInterface $administrator */
        $administrator = $this->users->create(
            [
                'display_name' => 'Administrator',
                'email'        => array_pull($data, 'ADMIN_EMAIL'),
                'username'     => array_pull($data, 'ADMIN_USERNAME'),
                'password'     => array_pull($data, 'ADMIN_PASSWORD'),
            ]
        );

        /* @var UserInterface $demo */
        $demo = $this->users->create(
            [
                'display_name' => 'Demo User',
                'email'        => 'demo@pyrocms.com',
                'password'     => 'password',
                'username'     => 'demo',
            ]
        );

        $demo->roles()->sync([$user->getId()]);
        $administrator->roles()->sync([$admin->getId()]);

        $this->activator->force($demo);
        $this->activator->force($administrator);

        $this->dispatch(new WriteEnvironmentFile($data));
    }
}
