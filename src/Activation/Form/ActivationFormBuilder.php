<?php namespace Anomaly\UsersModule\Activation\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ActivationFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Activation\Confirm
 */
class ActivationFormBuilder extends FormBuilder
{

    /**
     * No model.
     *
     * @var bool
     */
    protected $model = false;

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
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
        ],
        'code'  => [
            'type'         => 'anomaly.field_type.text',
            'label'        => 'anomaly.module.users::field.activation_code.name',
            'instructions' => 'anomaly.module.users::field.activation_code.instructions',
            'required'     => true
        ]
    ];

}
