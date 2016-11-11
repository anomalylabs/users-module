<?php namespace Anomaly\UsersModule\User\Password;

/**
 * Class ForgotPasswordFormFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ChangePasswordFormFields
{

    /**
     * Handle the fields.
     *
     * @param ChangePasswordFormBuilder $builder
     */
    public function handle(ChangePasswordFormBuilder $builder)
    {
        $builder->setFields(
            [
                'password_old' => [
                    'type' => 'anomaly.field_type.text',
                    'label' => 'anomaly.module.users::field.password_old.name',
                    'config' => [
                        'type' => 'password',
                    ],
                    'required' => true,
                    'rules' => [
                        'required|valid_password_old',
                    ],
                    'validators' => [
                        'valid_password_old' => [
                            'handler' => 'Anomaly\UsersModule\User\Validation\ValidateCurrentPassword@handle',
                            'message' => 'anomaly.module.users::message.invalid_password_old',
                        ],
                    ],
                ],
                'password_new' => [
                    'type' => 'anomaly.field_type.text',
                    'label' => 'anomaly.module.users::field.password_new.name',
                    'config' => [
                        'type' => 'password',
                    ],
                    'required' => true,
                    'rules' => [
                        'confirmed',
                    ],
                ],
                'password_new_confirmation' => [
                    'type' => 'anomaly.field_type.text',
                    'label' => 'anomaly.module.users::field.password_new.name',
                    'config' => [
                        'type' => 'password',
                    ],
                ],
            ]
        );
    }
}
