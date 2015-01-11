<?php namespace Anomaly\UsersModule\User\Form\Handle;

/**
 * Class ActionHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Form\Handle
 */
class ActionHandler
{

    /**
     * Return the form actions.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'save',
        ];
    }
}
