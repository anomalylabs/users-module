<?php namespace Anomaly\Streams\Addon\Module\Users\Ui\Table\Action;

use Anomaly\Streams\Addon\Module\Users\Activation\Contract\ActivationRepositoryInterface;

/**
 * Class ActivateUsersTableAction
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\Ui\Action
 */
class ActivateUsersTableAction
{

    /**
     * Handle the table action.
     *
     * @param array                         $ids
     * @param ActivationRepositoryInterface $activations
     * @return mixed
     */
    public function handle(array $ids, ActivationRepositoryInterface $activations)
    {
        $count = count($ids);

        /*foreach ($ids as $id) {

            $this->activations->forceActivation($id);
        }*/

        app('streams.messages')->add('success', trans('module.users::message.users_activated', compact('count')));
    }
}
 