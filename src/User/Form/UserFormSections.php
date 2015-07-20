<?php namespace Anomaly\UsersModule\User\Form;

use Anomaly\UsersModule\User\UserModel;

/**
 * Class UserFormSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Form
 */
class UserFormSections
{

    /**
     * Handle the form sections.
     *
     * @param UserFormBuilder $builder
     */
    public function handle(UserFormBuilder $builder, UserModel $users)
    {
        $fields = [
            'first_name',
            'last_name',
            'display_name',
            'username',
            'email',
            'password',
            'roles'
        ];

        $assignments = $users->getAssignments();

        $profileFields = $assignments->notLocked()->fieldSlugs();

        $builder->setSections(
            [
                [
                    'tabs' => [
                        'general' => [
                            'title'  => 'module::tab.general',
                            'fields' => $fields
                        ],
                        'profile' => [
                            'title'  => 'module::tab.profile',
                            'fields' => $profileFields
                        ]
                    ]
                ]
            ]
        );
    }
}
