<?php namespace Anomaly\UsersModule\User\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class UserFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Form
 */
class UserFormBuilder extends FormBuilder
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
        'username',
        'email',
        'password',
        'roles'
    ];

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'save'
    ];

}
