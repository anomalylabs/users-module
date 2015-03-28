<?php namespace Anomaly\UsersModule\User\Table;

use Illuminate\Http\Request;

/**
 * Class UserTableActions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Table
 */
class UserTableActions
{

    /**
     * Handle the table actions.
     *
     * @param UserTableBuilder $builder
     */
    public function handle(UserTableBuilder $builder)
    {
        $builder->setActions(
            [
                'delete',
                'block'    => [
                    'button'  => 'red',
                    'icon'    => 'remove user icon',
                    'text'    => 'module::button.block',
                    'handler' => 'Anomaly\UsersModule\User\Table\Action\BlockUsers@handle',
                    'enabled' => function (Request $request) {
                        return $request->get('view') !== 'blocked';
                    }
                ],
                'unblock'  => [
                    'button'  => 'green',
                    'icon'    => 'add user icon',
                    'text'    => 'module::button.unblock',
                    'handler' => 'Anomaly\UsersModule\User\Table\Action\UnblockUsers@handle',
                    'enabled' => function (Request $request) {
                        return $request->get('view') === 'blocked';
                    }
                ],
                'activate' => [
                    'button'  => 'green',
                    'icon'    => 'check icon',
                    'text'    => 'module::button.activate',
                    'handler' => 'Anomaly\UsersModule\User\Table\Action\ActivateUsers@handle',
                    'enabled' => function (Request $request) {
                        return $request->get('view') === 'pending_activation';
                    }
                ]
            ]
        );
    }
}
