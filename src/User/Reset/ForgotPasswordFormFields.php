<?php namespace Anomaly\UsersModule\User\Reset;

/**
 * Class ForgotPasswordFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Reset
 */
class ForgotPasswordFormFields
{

    /**
     * Handle the fields.
     *
     * @param ResetFormBuilder $builder
     */
    public function handle(ForgotPasswordFormBuilder $builder)
    {
        $builder->setFields(
            [
                'email' => [
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
                ]
            ]
        );
    }
}
