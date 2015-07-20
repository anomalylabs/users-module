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
            'type'       => 'anomaly.field_type.email',
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
        ],
        'code'  => [
            'type'     => 'anomaly.field_type.text',
            'required' => true
        ]
    ];

}
