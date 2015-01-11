<?php namespace Anomaly\UsersModule\Ui\Form\User\Command;

/**
 * Class LoadSectionsOptionHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Ui\Form\User\Command
 */
class LoadSectionsOptionHandler
{

    /**
     * Handle the command.
     *
     * @param LoadSectionsOption $command
     */
    public function handle(LoadSectionsOption $command)
    {
        $options = $command->getOptions();

        $options->put(
            'sections',
            [
                [
                    'title'  => 'Test',
                    'fields' => [
                        'username',
                    ]
                ]
            ]
        );
    }
}
