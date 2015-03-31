<?php namespace Anomaly\UsersModule\User\Form;

use Anomaly\UsersModule\User\UserModel;

/**
 * Class UserFormOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Form
 */
class UserFormOptions
{

    /**
     * Handle the fom fields.
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

        $profileFields = array_diff(
            $assignments->fieldSlugs(),
            config('anomaly.module.users::config.protected_fields')
        );

        $builder->setFormOption(
            'sections',
            [
                [
                    'tabs' => [
                        'general'        => [
                            'title'  => 'module::form.tab.general',
                            'fields' => $fields
                        ],
                        'profile_fields' => [
                            'title'  => 'module::form.tab.profile_fields',
                            'fields' => $profileFields
                        ]
                    ]
                ]
            ]
        );
    }
}
