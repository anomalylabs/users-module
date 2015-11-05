<?php namespace Anomaly\UsersModule\Installer\Listener;

use Anomaly\Streams\Platform\Installer\Event\StreamsHasInstalled;
use Anomaly\Streams\Platform\Installer\Installer;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateAdminRole
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Installer\Listener
 */
class CreateAdminRole
{

    use DispatchesJobs;

    /**
     * The role repository.
     *
     * @var RoleRepositoryInterface
     */
    protected $roles;

    /**
     * The user repository.
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * Create a new CreateAdminRole instance.
     *
     * @param RoleRepositoryInterface $roles
     * @param UserRepositoryInterface $users
     */
    public function __construct(RoleRepositoryInterface $roles, UserRepositoryInterface $users)
    {
        $this->roles = $roles;
        $this->users = $users;
    }

    /**
     * Handle the command.
     *
     * @param StreamsHasInstalled $event
     */
    public function handle(StreamsHasInstalled $event)
    {
        $installers = $event->getInstallers();

        $installers->add(
            new Installer(
                'Creating the admin role.',
                function () {

                    $user = $this->users->findByUsername(env('ADMIN_USERNAME'));

                    if (!$role = $this->roles->findBySlug('admin')) {
                        $role = $this->roles->create(['en' => ['name' => 'Admin'], 'slug' => 'admin']);
                    }

                    $user->roles()->attach($role);
                }
            )
        );
    }
}
