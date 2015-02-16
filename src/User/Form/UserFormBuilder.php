<?php namespace Anomaly\UsersModule\User\Form;

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
     * @var array
     */
    protected $fields = [
        'username',
        'email',
        'roles',
    ];

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'save',
    ];

    /**
     * The form buttons.
     *
     * @var string
     */
    protected $buttons = [
        'cancel',
        'delete'
    ];

    /**
     * Create a new UserFormBuilder instance.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $form->setOption('title', 'Test Title');

        parent::__construct($form);
    }
}
