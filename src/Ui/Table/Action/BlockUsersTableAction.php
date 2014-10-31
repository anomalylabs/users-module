<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Table\Action;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface;
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
     * The block repository object.
     *
     * @var
     */
    protected $blocks;

    /**
     * Create a new BlockUsersTableAction instance.
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
            $this->blocks->createBlock($id);
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
 