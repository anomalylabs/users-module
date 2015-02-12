<?php namespace Anomaly\UsersModule\User\Table;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class ButtonsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\User\Handler
 */
class UserTableButtons
{

    /**
     * Return the table buttons.
     *
     * @param UserTableBuilder $builder
     */
    public function handle(UserTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit',
                [
                    'button'  => 'delete',
                    'enabled' => function (UserInterface $entry) {
                        return ($entry->getId() !== 1);
                    }
                ]
            ]
        );
    }
}
