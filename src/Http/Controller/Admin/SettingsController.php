<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\SettingsModule\Setting\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SettingsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller\Admin
 */
class SettingsController extends AdminController
{

    /**
     * Return the settings form.
     *
     * @param SettingFormBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(SettingFormBuilder $form)
    {
        return $form->render('anomaly.module.users');
    }
}
