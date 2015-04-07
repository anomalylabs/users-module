<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Form\FieldFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class FieldsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller\Admin
 */
class FieldsController extends AdminController
{

    /**
     * Return an index of existing assignments.
     *
     * @param AssignmentTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AssignmentTableBuilder $table)
    {
        return $table
            ->setOption('stream', 'users')
            ->setOption('namespace', 'users')
            ->setOption('skip', config('anomaly.module.users::config.protected_fields'))
            ->render();
    }

    /**
     * Return a form for a new field.
     *
     * @param FieldFormBuilder $builder
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function create(FieldFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for an existing field.
     *
     * @param FieldFormBuilder $form
     * @param                  $id
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(FieldFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
