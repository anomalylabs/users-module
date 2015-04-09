<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Field\Form\FieldAssignmentFormBuilder;
use Anomaly\Streams\Platform\Field\Table\FieldAssignmentTableBuilder;
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
     * @param FieldAssignmentTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(FieldAssignmentTableBuilder $table)
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
     * @param FieldAssignmentFormBuilder $form
     * @param                            $type
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(FieldAssignmentFormBuilder $form, $type)
    {
        return $form->setOption('field_type', $type)->render();
    }

    /**
     * Return a form for an existing field.
     *
     * @param FieldAssignmentFormBuilder $form
     * @param                            $id
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(FieldAssignmentFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
