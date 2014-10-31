<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Table\Action;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Table\Contract\TableActionInterface;

/**
 * Class UnblockUsersTableAction
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui\Table\Action
 */
class UnblockUsersTableAction implements TableActionInterface
{

    /**
     * The block repository interface.
     *
     * @var
     */
    protected $blocks;

    /**
     * Create a new UnblockUsersTableAction instance.
     *
     * @param BlockRepositoryInterface $blocks
     */
    function __construct(BlockRepositoryInterface $blocks)
    {
        $this->blocks = $blocks;
    }

    /**
     * Handle the table action.
     *
     * @param array $ids
     * @return mixed|void
     */
    public function handle(array $ids)
    {
        foreach ($ids as $id) {
            $this->blocks->removeBlock($id);
        }

        app('streams.messages')->add('success', 'success.generic');
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
 