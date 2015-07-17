<?php namespace Anomaly\UsersModule\User\Login;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class LoginFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Form
 */
class LoginFormBuilder extends FormBuilder
{

    /**
     * The user instance. This is set
     * after a successful login
     * has validated.
     *
     * @var null|UserInterface
     */
    protected $user = null;

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'email'       => [
            'type'       => 'anomaly.field_type.email',
            'rules'      => [
                'valid_email'
            ],
            'validators' => [
                'valid_email' => [
                    'handler' => 'Anomaly\UsersModule\User\Login\Validation\ValidateEmail@handle',
                    'message' => 'anomaly.module.users::error.invalid_login'
                ]
            ]
        ],
        'password'    => [
            'type'       => 'anomaly.field_type.text',
            'rules'      => [
                'valid_login'
            ],
            'config'     => [
                'type' => 'password'
            ],
            'validators' => [
                'valid_login' => [
                    'handler' => 'Anomaly\UsersModule\User\Login\Validation\ValidateLogin@handle',
                    'message' => 'anomaly.module.users::error.invalid_login'
                ]
            ]
        ],
        'remember_me' => [
            'type' => 'anomaly.field_type.boolean'
        ]
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'wrapper_view' => 'anomaly.module.users::login'
    ];

    /**
     * Get the user.
     *
     * @return UserInterface|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the user.
     *
     * @param UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }
}
