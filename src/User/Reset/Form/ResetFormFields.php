<?php namespace Anomaly\UsersModule\Reset\Form;

/**
 * Class ResetFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Reset\Form
 */
class ResetFormFields
{

    /**
     * Handle the fields.
     *
     * @param ResetFormBuilder $builder
     */
    public function handle(ResetFormBuilder $builder)
    {
        $builder->setFields(
            [
                'email'                 => [
                    'type'         => 'anomaly.field_type.email',
                    'label'        => 'anomaly.module.users::field.email.name',
                    'instructions' => 'anomaly.module.users::field.email.instructions_alt',
                    'required'     => true,
                    'rules'        => [
                        'valid_email'
                    ],
                    'validators'   => [
                        'valid_email' => [
                            'handler' => 'Anomaly\UsersModule\User\Validation\ValidateEmail@handle',
                            'message' => 'anomaly.module.users::error.invalid_login'
                        ]
                    ]
                ],
                'code'                  => [
                    'type'         => 'anomaly.field_type.text',
                    'label'        => 'anomaly.module.users::field.reset_code.name',
                    'instructions' => 'anomaly.module.users::field.reset_code.instructions',
                    'required'     => true,
                    'config'       => [
                        'default_value' => $builder->getCode()
                    ]
                ],
                'password'              => [
                    'type'         => 'anomaly.field_type.text',
                    'label'        => 'anomaly.module.users::field.password.name',
                    'instructions' => 'anomaly.module.users::field.password.instructions_alt',
                    'required'     => true,
                    'rules'        => [
                        'confirmed'
                    ],
                    'config'       => [
                        'type' => 'password'
                    ]
                ],
                'password_confirmation' => [
                    'type'         => 'anomaly.field_type.text',
                    'label'        => 'anomaly.module.users::field.confirm_password.name',
                    'instructions' => 'anomaly.module.users::field.confirm_password.instructions_alt',
                    'required'     => true,
                    'config'       => [
                        'type' => 'password'
                    ]
                ]
            ]
        );
    }
}
