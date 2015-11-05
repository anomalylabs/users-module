<?php namespace Anomaly\UsersModule\Installer\Listener;

use Anomaly\Streams\Platform\Installer\Event\StreamsHasInstalled;
use Anomaly\Streams\Platform\Installer\Installer;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\UserActivator;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateAdminUser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Installer\Listener
 */
class CreateAdminUser
{

    use DispatchesJobs;

    /**
     * The user repository.
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * The user activator.
     *
     * @var UserActivator
     */
    protected $activator;

    /**
     * Create a new CreateAdminUser
     *
     * @param UserRepositoryInterface $users
     * @param UserActivator           $activator
     */
    public function __construct(UserRepositoryInterface $users, UserActivator $activator)
    {
        $this->users     = $users;
        $this->activator = $activator;
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
                'Creating the admin user.',
                function () {

                    $credentials = [
                        'display_name' => 'Administrator',
                        'email'        => env('ADMIN_EMAIL'),
                        'username'     => env('ADMIN_USERNAME'),
                        'password'     => env('ADMIN_PASSWORD')
                    ];

                    if ($user = $this->users->findByUsername(env('ADMIN_USERNAME'))) {

                        $user->email    = env('ADMIN_EMAIL');
                        $user->password = env('ADMIN_PASSWORD');

                        $this->users->save($user);
                    } else {
                        $user = $this->users->create($credentials);
                    }

                    $this->activator->force($user);
                }
            )
        );
    }
}
