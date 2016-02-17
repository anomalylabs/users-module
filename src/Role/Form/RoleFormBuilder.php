<?php namespace Anomaly\UsersModule\Role\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class RoleFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\RoleInterface\Form
 */
class RoleFormBuilder extends FormBuilder
{

    /**
     * The skipped fields.
     *
     * @var array
     */
    protected $skips = [
        'permissions'
    ];

}
