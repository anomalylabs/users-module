<?php namespace Anomaly\UsersModule\User\Ui\Table\Handler;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class ButtonsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\User\Handler
 */
class ButtonHandler
{

    /**
     * Return the table buttons.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'edit',
            [
                'button'  => 'delete',
                'enabled' => function (UserInterface $entry) {
                    return ($entry->getId() !== 1);
                }
            ]
        ];
    }
}
