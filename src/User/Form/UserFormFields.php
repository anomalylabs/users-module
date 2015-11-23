<?php namespace Anomaly\UsersModule\User\Form;

use Anomaly\UsersModule\User\UserModel;

/**
 * Class UserFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Form
 */
class UserFormFields
{

    /**
     * Handle the form fields.
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
            'password' => [
                'value'    => '',
                'required' => false,
                'rules'    => [
                    'required_if:password,*'
                ]
            ],
            'activated',
            'enabled',
            'roles'
        ];

        $assignments = $users->getAssignments();

        $builder->setFields(array_merge($fields, $assignments->notLocked()->fieldSlugs()));
    }
}
