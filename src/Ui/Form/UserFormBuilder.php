<?php namespace Anomaly\UsersModule\Ui\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class UserFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui
 */
class UserFormBuilder extends FormBuilder
{

    protected $model = 'Anomaly\UsersModule\User\UserModel';

    protected $actions = [
        'save',
    ];

    protected $buttons = [
        'cancel',
        'delete'
    ];

    protected $fields = [
        'username',
        'roles'
    ];
}
 