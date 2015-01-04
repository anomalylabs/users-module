<?php namespace Anomaly\UsersModule\Ui\Form\User;

use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Laracasts\Commander\CommanderTrait;

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

    use CommanderTrait;

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
    protected $fields = 'Anomaly\UsersModule\Ui\Form\User\Handle\FieldHandler@handle';

    /**
     * The form actions.
     *
     * @var string
     */
    protected $actions = 'Anomaly\UsersModule\Ui\Form\User\Handle\ActionHandler@handle';

    /**
     * The form buttons.
     *
     * @var string
     */
    protected $buttons = 'Anomaly\UsersModule\Ui\Form\User\Handle\ButtonHandler@handle';

    /**
     * Create a new UserFormBuilder instance.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $options = $form->getOptions();

        $options->title = 'Test Title';

        //$this->execute('Anomaly\UsersModule\Ui\Form\User\Command\LoadSectionsOptionCommand', compact('options'));

        parent::__construct($form);
    }
}
