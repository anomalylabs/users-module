<?php namespace Anomaly\UsersModule\User\Register;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\UsersModule\User\Register\Command\AssociateActivationRoles;
use Anomaly\UsersModule\User\Register\Command\SetOptions;

/**
 * Class RegisterFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register
 */
class RegisterFormBuilder extends FormBuilder
{

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\UsersModule\User\UserModel';

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'first_name',
        'last_name',
        'display_name',
        'username',
        'email',
        'password'
    ];

    /**
     * The form skips.
     *
     * @var array
     */
    protected $skips = [
        /*'roles',
        'avatar',
        'enabled',
        'activated',
        'reset_code',
        'ip_address',
        'permissions',
        'last_login_at',
        'remember_token',
        'activation_code',
        'last_activity_at'*/
    ];
    
    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'register' => [
            'button' => 'blue',
            'text'   => 'Register'
        ]
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'wrapper_view' => 'anomaly.module.users::register'
    ];

    /**
     * Fired when the builder is ready.
     */
    public function onReady()
    {
        $this->dispatch(new SetOptions($this));
    }

    /**
     * Fired after the form is saved.
     */
    public function onSaved()
    {
        $this->dispatch(new AssociateActivationRoles($this->getFormEntry()));
    }
}
