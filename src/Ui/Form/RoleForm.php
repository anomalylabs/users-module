<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Form;

use Anomaly\Streams\Addon\Module\Users\Role\RoleModel;
use Anomaly\Streams\Platform\Ui\Form\Form;

class RoleForm extends Form
{

    /**
     * Setup the form class.
     */
    protected function boot()
    {
        $this->setUpModel();
        $this->setUpActions();
        $this->setUpSections();
        $this->setUpRedirects();
    }

    /**
     * Set up the model.
     */
    protected function setUpModel()
    {
        $this->setModel(new RoleModel());
    }

    /**
     * Set up form redirects.
     */
    protected function setUpRedirects()
    {
        $this->setRedirects(
            [
                'save',
            ]
        );
    }

    /**
     * Set up the form actions.
     */
    protected function setUpActions()
    {
        $this->setActions(
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
 