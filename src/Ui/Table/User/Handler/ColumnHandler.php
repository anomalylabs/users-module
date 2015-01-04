<?php namespace Anomaly\UsersModule\Ui\Table\User\Handler;

use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class ColumnHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Table\User\Handler
 */
class ColumnHandler
{

    /**
     * Return the table columns.
     *
     * @return array
     */
    public function handle()
    {
        return [
            [
                'heading' => 'username',
                'value'   => function (UserInterface $entry) {
                        return view('module::ui/table/users/username', compact('entry'));
                    },
            ],
            'email',
        ];
    }
}
