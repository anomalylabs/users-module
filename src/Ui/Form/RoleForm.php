<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Form;

use Anomaly\Streams\Addon\Module\Users\Role\RoleModel;
use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class RoleForm
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui\Form
 */
class RoleForm extends FormBuilder
{

    /**
     * Create new RoleForm instance.
     *
     * @param Form $form
     */
    function __construct(Form $form)
    {
        $this->setUpModel();
        $this->setUpButtons();
        $this->setUpSections();
        $this->setUpActions();

        parent::__construct($form);
    }

    /**
     * Set up the model.
     */
    protected function setUpModel()
    {
        $this->setModel(new RoleModel());
    }

    /**
     * Set up form actions.
     */
    protected function setUpActions()
    {
        $this->setActions(
            [
                'save',
            ]
        );
    }

    /**
     * Set up the form buttons.
     */
    protected function setUpButtons()
    {
        $this->setButtons(
            [
                'cancel',
                'delete',
            ]
        );
    }

    /**
     * Set up the form sections.
     */
    protected function setUpSections()
    {
        $this->setSections(
            [
                [
                    'fields' => [
                        'name',
                        'slug',
                        'permissions',
                    ],
                ],
            ]
        );
    }
}
 