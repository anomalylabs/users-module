<?php namespace Anomaly\UsersModule\User\Form;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class UserFormButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Form
 */
class UserFormButtons
{

    /**
     * Handle the form buttons.
     *
     * @param UserFormBuilder $builder
     */
    public function handle(UserFormBuilder $builder)
    {
        $builder->setButtons(
            [
                'cancel',
                'delete',
                [
                    'button'  => 'red',
                    'icon'    => 'icon remove user',
                    'text'    => 'module::button.block',
                    'href'    => '/admin/users/block/{entry.id}',
                    'enabled' => function (UserInterface $entry) {
                        return !$entry->isBlocked();
                    }
                ],
                [
                    'button'  => 'green',
                    'icon'    => 'icon user',
                    'text'    => 'module::button.unblock',
                    'href'    => '/admin/users/unblock/{entry.id}',
                    'enabled' => function (UserInterface $entry) {
                        return $entry->isBlocked();
                    }
                ],
                [
                    'button'  => 'green',
                    'icon'    => 'icon checkmark',
                    'text'    => 'module::button.activate',
                    'href'    => '/admin/users/activate/{entry.id}',
                    'enabled' => function (UserInterface $entry) {
                        return !$entry->isActivated();
                    }
                ]
            ]
        );
    }
}
