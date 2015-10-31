<?php namespace Anomaly\UsersModule\User\Reset;

/**
 * Class CompleteResetFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Reset
 */
class CompleteResetFormFields
{

    /**
     * Handle the fields.
     *
     * @param CompleteResetFormBuilder $builder
     */
    public function handle(CompleteResetFormBuilder $builder)
    {
        $builder->setFields(
            [
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
