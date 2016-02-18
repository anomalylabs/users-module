<?php namespace Anomaly\UsersModule\User\Password;

/**
 * Class ResetPasswordFormFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\User\Password
 */
class ResetPasswordFormFields
{

    /**
     * Handle the fields.
     *
     * @param ResetPasswordFormBuilder $builder
     */
    public function handle(ResetPasswordFormBuilder $builder)
    {
        $builder->setFields(
            [
                'password'              => [
                    'type'     => 'anomaly.field_type.text',
                    'label'    => 'anomaly.module.users::field.password.name',
                    'required' => true,
                    'rules'    => [
                        'confirmed'
                    ],
                    'config'   => [
                        'type' => 'password'
                    ]
                ],
                'password_confirmation' => [
                    'type'     => 'anomaly.field_type.text',
                    'label'    => 'anomaly.module.users::field.confirm_password.name',
                    'required' => true,
                    'config'   => [
                        'type' => 'password'
                    ]
                ]
            ]
        );
    }
}
