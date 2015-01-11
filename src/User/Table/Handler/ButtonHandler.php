<?php namespace Anomaly\UsersModule\User\Table\Handler;

/**
 * Class ButtonHandler
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
        ];
    }
}
