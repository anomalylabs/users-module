<?php namespace Anomaly\UsersModule\User\Ui\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Foundation\Bus\DispatchesCommands;

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

    use DispatchesCommands;

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\UsersModule\User\UserModel';

    /**
     * The form fields.
     *
     * @var string
     */
    protected $fields = 'Anomaly\UsersModule\User\Ui\Form\Handle\FieldsHandler@handle';

    /**
     * The form actions.
     *
     * @var string
     */
    protected $actions = 'Anomaly\UsersModule\User\Ui\Form\Handle\ActionsHandler@handle';

    /**
     * The form buttons.
     *
     * @var string
     */
    protected $buttons = 'Anomaly\UsersModule\User\Ui\Form\Handle\ButtonsHandler@handle';

    /**
     * Create a new UserFormBuilder instance.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $options = $form->getOptions();

        $options->title = 'Test Title';

        parent::__construct($form);
    }
}
