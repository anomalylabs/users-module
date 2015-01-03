<?php namespace Anomaly\UsersModule\Ui\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class RoleFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Form
 */
class RoleFormBuilder extends FormBuilder
{

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\UsersModule\Role\RoleModel';

    /**
     * @var array
     */
    protected $actions = [
        'save',
    ];

    /**
     * @var array
     */
    protected $buttons = [
        'cancel',
        'delete'
    ];
}
 