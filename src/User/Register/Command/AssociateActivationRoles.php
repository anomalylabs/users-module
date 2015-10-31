<?php namespace Anomaly\UsersModule\User\Register\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\UsersModule\Role\Contract\RoleRepositoryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class AssociateActivationRoles
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register\Command
 */
class AssociateActivationRoles implements SelfHandling
{

    /**
     * The user instance.
     *
     * @var UserInterface
     */
    protected $user;

    /**
     * Create a new AssociateActivationRoles instance.
     *
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @param RoleRepositoryInterface    $roles
     */
    public function handle(
        SettingRepositoryInterface $settings,
        RoleRepositoryInterface $roles
    ) {
        $activationRoles = $settings->value('anomaly.module.users::activation_roles', []);

        foreach ($activationRoles as $role) {
            if ($role = $roles->find($role)) {
                $this->user->attachRole($role);
            }
        }
    }

}
