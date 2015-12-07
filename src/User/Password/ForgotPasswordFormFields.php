<?php namespace Anomaly\UsersModule\User\Password;

/**
 * Class ForgotPasswordFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Password
 */
class ForgotPasswordFormFields
{

    /**
     * Handle the fields.
     *
     * @param ForgotPasswordFormBuilder $builder
     */
    public function handle(ForgotPasswordFormBuilder $builder)
    {
        $builder->setFields(
            [
                'email' => [
                    'type'       => 'anomaly.field_type.email',
                    'label'      => 'anomaly.module.users::field.email.name',
                    'required'   => true,
                    'rules'      => [
                        'valid_email'
                    ],
                    'validators' => [
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
