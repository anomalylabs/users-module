<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class UserFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui
 */
class UserFormBuilder extends FormBuilder
{

    protected $model = 'Anomaly\Streams\Addon\Module\Users\User\UserModel';

    protected $sections = [
        [
            'title'  => 'Test Title',
            'fields' => [
                'username',
                'email',
                'roles',
            ]
        ]
    ];

    protected $actions = [
        'save',
    ];

    protected $buttons = [
        'edit' => 'Testing',
    ];
}
 