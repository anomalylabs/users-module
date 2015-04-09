<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Field\Form\FieldAssignmentFormBuilder;
use Anomaly\Streams\Platform\Field\Table\FieldAssignmentTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Routing\Redirector;

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
     * @param FieldTypeCollection        $fieldTypes
     * @param Redirector                 $redirect
     * @param null                       $type
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(
        FieldAssignmentFormBuilder $form,
        FieldTypeCollection $fieldTypes,
        Redirector $redirect,
        $type = null
    ) {

        // If no type is passed, use the text field type.
        if (!$type && $type = $fieldTypes->findBySlug('text')) {
            return $redirect->to('admin/users/fields/create/' . $type->getNamespace());
        }

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
