<?php namespace Anomaly\UsersModule\User\Login;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\UserSecurity;
use Symfony\Component\HttpFoundation\Response;

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
     * No model.
     *
     * @var bool
     */
    protected $model = false;

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
            'label'      => 'anomaly.module.users::field.email.name',
            'type'       => 'anomaly.field_type.email',
            'required'   => true,
            'rules'      => [
                'valid_email'
            ],
            'validators' => [
                'valid_email' => [
                    'handler' => 'Anomaly\UsersModule\User\Validation\ValidateEmail@handle',
                    'message' => 'anomaly.module.users::message.invalid_login'
                ]
            ]
        ],
        'password'    => [
            'label'      => 'anomaly.module.users::field.password.name',
            'type'       => 'anomaly.field_type.text',
            'required'   => true,
            'config'     => [
                'type' => 'password'
            ],
            'rules'      => [
                'valid_credentials'
            ],
            'validators' => [
                'valid_credentials' => [
                    'handler' => 'Anomaly\UsersModule\User\Validation\ValidateCredentials@handle',
                    'message' => 'anomaly.module.users::message.invalid_login'
                ]
            ]
        ],
        'remember_me' => [
            'label'  => false,
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'mode'           => 'checkbox',
                'checkbox_label' => 'anomaly.module.users::field.remember_me.name'
            ]
        ]
    ];

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'login' => [
            'button' => 'blue',
            'text'   => 'Login'
        ]
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'redirect'     => '/',
        'wrapper_view' => 'anomaly.module.users::login'
    ];

    /**
     * Fired when the form is posting.
     *
     * @param UserSecurity $security
     */
    public function onPosting(UserSecurity $security)
    {
        $response = $security->check();

        if ($response instanceof Response) {

            $this->setFormResponse($response);

            $this->setSave(false);
        }
    }

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
