<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Action;

use Anomaly\Streams\Platform\Ui\Table\Contract\TableActionInterface;

class ActivateUsersTableAction implements TableActionInterface
{

    /**
     * Handle the table action.
     *
     * @param array $ids
     * @return mixed
     */
    public function handle(array $ids)
    {
        $count = count($ids);

        app('streams.messages')->add('success', trans('module.users::message.users_activated', compact('count')));
    }

    /**
     * Authorize the user to process the action.
     *
     * @return mixed
     */
    public function authorize()
    {
        // TODO: Implement authorize() method.
    }
}
 