<?php namespace Anomaly\UsersModule\Ui\Form\Role;

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
     * The form fields.
     *
     * @var array
     */
    protected $fields = 'Anomaly\UsersModule\Ui\Form\Role\Handler\FieldHandler@handle';

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = 'Anomaly\UsersModule\Ui\Form\Role\Handler\ActionHandler@handle';

    /**
     * The form buttons.
     *
     * @var array
     */
    protected $buttons = 'Anomaly\UsersModule\Ui\Form\Role\Handler\ButtonHandler@handle';
}
