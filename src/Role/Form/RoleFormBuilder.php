<?php namespace Anomaly\UsersModule\Role\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class RoleFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Role\Form
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
     * The form buttons.
     *
     * @var string
     */
    protected $buttons = 'Anomaly\UsersModule\Role\Form\Handler\ButtonsHandler@handle';

    /**
     * The skipped fields.
     *
     * @var array
     */
    protected $skips = ['permissions'];

}
