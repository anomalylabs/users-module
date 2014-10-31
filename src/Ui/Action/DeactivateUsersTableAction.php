<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Action;

use Anomaly\Streams\Addon\Module\Users\Activation\ActivationService;
use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Table\Contract\TableActionInterface;

/**
 * Class DeactivateUsersTableAction
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui\Table\Action
 */
class DeactivateUsersTableAction implements TableActionInterface
{

    /**
     * The activation repository service.
     *
     * @var
     */
    protected $activations;

    /**
     * Create a new DeactivateUsersTableAction instance.
     *
     * @param ActivationService $activations
     */
    function __construct(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
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

            $this->activations->removeActivation($id);
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
 