<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Table\Action;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Table\Contract\TableActionInterface;

/**
 * Class ActivateUsersTableAction
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui\Action
 */
class ActivateUsersTableAction implements TableActionInterface
{

    /**
     * The activation repository interface object.
     *
     * @var
     */
    protected $activations;

    /**
     * Create a new ActivateUsersTableAction instance.
     *
     * @param ActivationRepositoryInterface $service
     */
    function __construct(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
    }

    /**
     * Handle the table action.
     *
     * @param array $ids
     * @return mixed
     */
    public function handle(array $ids)
    {
        $count = count($ids);

        foreach ($ids as $id) {

            $this->activations->forceActivation($id);
        }

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
 