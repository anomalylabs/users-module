<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Action;

use Anomaly\Streams\Platform\Ui\Table\Contract\TableActionInterface;

/**
 * Class BlockUsersTableAction
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui\Table\Action
 */
class BlockUsersTableAction implements TableActionInterface
{

    /**
     * Handle the table action.
     *
     * @param array $ids
     * @return mixed|void
     */
    public function handle(array $ids)
    {
        foreach ($ids as $id) {
            // Block them.
        }
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
 